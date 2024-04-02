<?php

namespace App\Http\Controllers\Customer\CompanyProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CompanyProfile\CompanyProfileRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Advert;
use App\Models\Meta;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    public function companyProfile()
    {
        $user = Auth::user();
        $company = $user->metas()->where("key", "company")->first();
        if (empty($company)) {
            $result =   Meta::create([
                'metaable_type' => 'App\Models\User',
                'metaable_id' => $user->id,
                'key' => 'company',
                'value' => [
                    "company_name"     => '',
                    "postal_code"      => '',
                    "site_name"        => '',
                    "subject"          => '',
                    "email"            => '',
                    "telephone_number" => '',
                    "phone_number"     => '',
                    "image"            => '',
                    "address"          => '',
                ],
            ]);
            $company = $result;
        }
        return view("customer.account.company-profile", compact("company"));
    }
    public function companyProfileStore(CompanyProfileRequest $request, ImageService $imageService)
    {
        try {
        $user = Auth::user();
        $company = $user->metas()->where("key", "company")->first();

        $inputs = $request->all();
        //uploaded image
        if ($request->hasFile("image")) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'user-meta-company');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->back()->with('swal-error', 'عکس با موفقیت آپلود نشد!! ');
            }
            $inputs['image'] = $result;
        } else {
            $inputs['image'] = $company->value['image'];
        }
        $inputs['user'] = [
            "company_name" => $request->company_name,
            "postal_code" => $request->postal_code,
            "email" => $request->email,
            "subject" => $request->subject,
            "address" => $request->address,
            "site_name" => $request->site_name,
            "image" => $inputs['image'],
            "phone_number" => $request->phone_number,
            "telephone_number" => $request->telephone_number,
        ];
        $matchThese = ['metaable_id' => $user->id, 'key' => "company"];

        $meta = Meta::updateOrCreate($matchThese, [
            'metaable_type' => 'App\Models\User',
            'metaable_id' => $user->id,
            'key' => 'company',
            'value' => $inputs['user'],
        ]);
        return redirect()->back()->with('swal-success', 'پروفایل سازمانی با موفقیت ثبت شد');
        } catch (\Exception $e) {
            return redirect()->back()->with('swal-error', 'ثبت پروفایل با مشکل مواجه شد');
        }
    }
    public function advertManagement()
    {
        $adverties = Advert::where("user_id", Auth::user()->id)->get();
        return view("customer.account.advert-management", compact("adverties"));
    }
    public function resumeManagement(Advert $advert)
    {
        $user = $advert->user->metas()->where("key", "company")->first();

        return view("customer.account.resume-management", compact("advert"));
    }
}
