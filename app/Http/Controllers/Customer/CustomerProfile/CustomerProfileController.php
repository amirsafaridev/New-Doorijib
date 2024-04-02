<?php

namespace App\Http\Controllers\Customer\CustomerProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Profile\ProfileRequest;
use App\Http\Services\File\FileService;
use App\Http\Services\Image\ImageService;
use App\Models\Meta;
use Illuminate\Support\Facades\Auth;

class CustomerProfileController extends Controller
{
    public function userBookmark()
    {
        $adverties = Auth::user()->adverties()->get();
        return view("customer.account.user-bookmark", compact("adverties"));
    }
    public function userResume()
    {
        $adverties = Auth::user()->resumeAdverties()->get();
        return view("customer.account.user-resume", compact("adverties"));
    }
    public function profile()
    {
        $user = Auth::user();
        $userMeta = $user->metas()->where("key", "user")->first();
        if (empty($userMeta)) {
            $result =   Meta::create([
                'metaable_type' => 'App\Models\User',
                'metaable_id' => $user->id,
                'key' => 'user',
                'value' => [
                    "first_name" => '',
                    "last_name" => '',
                    "email" => '',
                    "grade" => 0,
                    "study" => '',
                    "skill" => '',
                    "image" => '',
                    "resume" => '',
                    "experience" => '',
                ],
            ]);
            $userMeta = $result;
        }
        return view("customer.account.profile", compact("userMeta"));
    }
    public function profileStore(ProfileRequest $request, ImageService $imageService, FileService $fileService)
    {
        try {
            $user = Auth::user();
            $userMeta = $user->metas()->where("key", "user")->first();
            $inputs = $request->all();
            //uploaded image
            if ($request->hasFile("image")) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'user-meta');
                $result = $imageService->createIndexAndSave($request->file('image'));
                if ($result === false) {
                    return redirect()->back()->with('swal-error', 'عکس با موفقیت آپلود نشد!! ');
                }
                $inputs['image'] = $result;
            }
            else {
                $inputs['image'] = $userMeta->value['image'];
            }
            //uploaded resume
            if ($request->hasFile('resume')) {
                $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'resume');
                $fileService->setFileSize($request->file('resume'));
                $result = $fileService->moveToPublic($request->file('resume'));
                if ($result === false) {
                    return redirect()->back()->with('swal-error', 'فایل با موفقیت آپلود نشد!! ');
                }

                $inputs['resume'] = $result;
            }
            else {
                $inputs['resume'] = $userMeta->value['resume'];
            }
            $inputs['user'] = [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "grade" => $request->grade,
                "study" => $request->study,
                "skill" => $request->skill,
                "image" => $inputs['image'],
                "resume" => $inputs['resume'],
                "experience" => $request->experience,
            ];
            $matchThese = ['metaable_id' => $user->id, 'key' => "user"];

            $meta = Meta::updateOrCreate($matchThese, [
                'metaable_type' => 'App\Models\User',
                'metaable_id' => $user->id,
                'key' => 'user',
                'value' => $inputs['user'],
            ]);
            return redirect()->back()->with('swal-success', 'مشخصات شخصی با موفقیت ثبت شد');
        } catch (\Exception $e) {
            return redirect()->back()->with('swal-error', 'ثبت مشخصات با مشکل مواجه شد');
        }
    }
}
