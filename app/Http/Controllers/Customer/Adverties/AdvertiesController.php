<?php

namespace App\Http\Controllers\Customer\Adverties;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Advert\AdvertRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Advert;
use App\Models\Media;
use App\Models\Province;
use App\Models\SalePlan;
use App\Models\Taxonomy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertiesController extends Controller
{
    public function index()
    {
        $adverties = Advert::where('status', 1)->get();
        $provinces = Province::all();
        return view("customer.adverties.index", compact("adverties", "provinces"));
    }
    public function category(Taxonomy $category)
    {
        $adverties = Advert::where('category_id', $category->id)->where('status', 1)->get();
        $provinces = Province::all();

        return view("customer.adverties.index", compact("adverties", "provinces"));
    }
    public function create()
    {
        $user = Auth::user();
        if ($user->role != 2 && $user->role != 1) {
            return redirect()->back()->with('swal-warning', 'شما کاربر کارفرما نیستید');
        }
        $sales_plan = SalePlan::all();
        $company = Auth::user()->metas()->where("key", "company")->first();
        $categories = Taxonomy::where('key', 'category')->get();
        $provinces = Province::all();
        return view("customer.account.advert.create", compact("provinces", "company", "sales_plan", "categories"));
    }
    public function store(AdvertRequest $request, ImageService $imageService)
    {
        $user = Auth::user();
        try {
            $inputs = $request->all();
            //uploaded image
            if ($request->hasFile('image')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'advert');
                $result = $imageService->createIndexAndSave($request->file('image'));
                if ($result === false) {
                    return redirect()->back()->with('swal-error', 'عکس با موفقیت آپلود نشد!! ');
                }
                $inputs['image'] = $result;
                $media['image'] = $inputs['image'];
            }
            $inputs['user_id'] = $user->id;
            $inputs['status'] = 0;
            if ($inputs['contact_type'] == 1) {
                $inputs['contact_ways'] = [
                    'mobile'   => $user->mobile,
                    'telegram' => $request->telegram,
                    'whatsapp' => $request->whatsapp,
                ];
            } else {
                $inputs['contact_ways'] = [
                    'mobile'   => $user->mobile,
                    'telegram' => null,
                    'whatsapp' => null,
                ];
            }

            $advert = Advert::create($inputs);
            $media = Media::create([
                'mediable_type' => 'App\Models\Advert',
                'mediable_id' => $advert->id,
                'key' => 'image',
                'path' => $media['image'],
                'mim_type' => $imageService->getimageFormat()
            ]);

            return redirect()->back()->with('swal-success', 'آگهی با موفقیت ثبت شد');
        } catch (\Exception $e) {
            return redirect()->back()->with('swal-error', 'ثبت آگهی با مشکل مواجه شد');
        }
    }
    public function edit(Advert $advert)
    {
        $provinces = Province::all();
        $categories = Taxonomy::where('key', 'category')->get();

        return view("customer.account.advert.edit", compact("provinces", "advert", "categories"));
    }
    public function update(AdvertRequest $request, Advert $advert, ImageService $imageService)
    {
        $user = Auth::user();
        try {
            $inputs = $request->all();
            if ($request->hasFile('image')) {
                if (!empty($request->image)) {
                    $imageService->deleteDirectoryAndFind($advert->imageadvert()->path['directory']);
                }
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'advert');
                $result = $imageService->createIndexAndSave($request->file('image'));
                if ($result === false) {
                    return redirect()->back()->with('swal-error', 'عکس با موفقیت آپلود نشد!! ');
                }
                $inputs['image'] = $result;
            } else {
                if (!empty($advert->imageadvert()->path)) {
                    $inputs['image'] = $advert->imageadvert()->path;
                }
            }
            if ($inputs['contact_type'] == 1) {
                $inputs['contact_ways'] = [
                    'mobile'   => $user->mobile,
                    'telegram' => $request->telegram,
                    'whatsapp' => $request->whatsapp,
                ];
            } else {
                $inputs['contact_ways'] = [
                    'mobile'   => $user->mobile,
                    'telegram' => null,
                    'whatsapp' => null,
                ];
            }
            $advert->update($inputs);
            $mediable = Media::where('mediable_id', $advert->id)->first();

            $mediable->update([
                'path' =>  $inputs['image']
            ]);

            return redirect()->back()->with('swal-success', 'آگهی با موفقیت ویرایش شد');
        } catch (\Exception $e) {
            return redirect()->back()->with('swal-error', 'ثبت آگهی با مشکل مواجه شد');
        }
    }
    public function show(Advert $advert)
    {
        $user = $advert->user->metas()->where("key", "user")->first();
        $userCompany = $advert->user->metas()->where("key", "company")->first();
        $adverties = Advert::where('category_id', $advert->category->id)->where('status', 1)->get();
        return view("customer.advert.index", compact("advert", "adverties", "user", "userCompany"));
    }
    public function addToBookmark(Advert $advert)
    {
        if (Auth::check()) {
            $advert->userBookmark()->toggle([Auth::user()->id]);
            if ($advert->userBookmark->contains(Auth::user()->id)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }
    public function addToResume(Advert $advert)
    {

        if (Auth::check()) {
                    $resume = Auth::user()->metas()->where("key", "company")->first();

            if (empty($resume->value['resume'])) {
                return redirect()->back()->with('swal-warning', 'لطفا ابتدا رزومه خود را آپلود کنید');
            }
            $advert->resumeUsers()->toggle([Auth::user()->id]);
            return redirect()->back()->with('swal-success', 'رزومه ارسالی شما با موفقیت تغییر وضعیت داد');
        } else {
            return redirect()->back()->with('swal-warning', 'لطفا ابتدا وارد سایت شوید');
        }
    }
    public function approved(User $resume, Advert $advert)
    {
        $resume->resumeAdverties()->sync([$advert->id => ['status' => '1']]);
        return redirect()->back()->with('swal-success', 'وضعیت رزومه با موفقیت تغییر کرد');
    }
    public function waiting(User $resume, Advert $advert)
    {
        $resume->resumeAdverties()->sync([$advert->id => ['status' => '0']]);
        return redirect()->back()->with('swal-success', 'وضعیت رزومه با موفقیت تغییر کرد');
    }
    public function reject(User $resume, Advert $advert)
    {
        $resume->resumeAdverties()->sync([$advert->id => ['status' => '2']]);
        return redirect()->back()->with('swal-success', 'وضعیت رزومه با موفقیت تغییر کرد');
    }
    public function search(Request $request)
    {
        $category = Taxonomy::where('key', 'category')->where('value', $request->input('category'))->first();

        // شروع کوئری اولیه
        $query = Advert::query();
        // اعمال شرط برای جستجو بر اساس عنوان شغلی
        if (!empty($request->title)) {
            $query->where('title', 'like', '%' . $request->input('job-title') . '%');
        }
        // اعمال شرط برای جستجو بر اساس استان
        if (!empty($request->province)) {
            $query->where('province_id',  $request->input('province'));
        }
        // اعمال شرط برای جستجو بر اساس نوع قرارداد
        if (!empty($request->contract)) {
            $query->where('contract_type', $request->input('contract'));
        }
        // اعمال شرط برای جستجو بر اساس جنسیت
        if (!empty($request->category)) {
            $query->where('category_id', $category->id);
        }
        // اجرای کوئری
        $adverties = $query->get();
        // بازگردانی نتایج
        $provinces = Province::all();

        return view("customer.adverties.index", compact("adverties", "provinces"));
    }
    public function searchJobs(Request $request, $title1 = null, $title2 = null, $title3 = null, $title4 = null)
    {
        $province = Province::where('slug', $title1)->orWhere('slug', $title2)->orWhere('slug', $title3)->first();
        $category = Taxonomy::where('key', 'category')->where('slug', $title1)->orWhere('slug', $title2)->orWhere('slug', $title3)->first();
        // شروع کوئری اولیه
        $query = Advert::query();
        // اعمال شرط برای جستجو بر اساس عنوان شغلی
        if (!empty($title1)) {
            $query->where('title', $title1)->orWhere('province_id', $province ? $province->id : $title1)->orWhere('category_id',  $category ? $category->id : $title1);
            if (!empty($title2)) {
                $query
                    ->where('province_id',  $province ? $province->id : $title1)->orWhere('category_id',  $category ? $category->id : $title1);
                if (!empty($title3)) {
                    $query->where('category_id',  $category ? $category->id : $title1);
                }
            }
        }
        $adverties = $query->get();
        // بازگردانی نتایج
        $provinces = Province::all();

        return view("customer.adverties.index", compact("adverties", "provinces"));
    }
}
