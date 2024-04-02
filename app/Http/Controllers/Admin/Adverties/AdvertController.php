<?php

namespace App\Http\Controllers\Admin\Adverties;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adverties\AdvertRequest;
use App\Http\Requests\Admin\Adverties\AdvertSearchRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Advert;
use App\Models\Media;
use App\Models\Province;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adverties = Advert::paginate(15)->withQueryString();
        return view('admin.adverties.index', compact('adverties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();

        $categories = Taxonomy::where('key', 'category')->get();
        return view('admin.adverties.create', compact('categories','provinces'));
    }
    public function getCities(Province $province)
    {
        $cities = $province->cities;
        if ($cities != null) {
            return response()->json(['status' => true, 'cities' => $cities]);
        } else {
            return response()->json(['status' => false, 'cities' => null]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertRequest $request, ImageService $imageService)
    {
         try {
            $inputs = $request->all();
            //uploaded image
            if ($request->hasFile('image')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'advert');
                $result = $imageService->createIndexAndSave($request->file('image'));
                if ($result === false) {
                    return to_route('admin.advertise.index')->with('swal-error', 'عکس با موفقیت آپلود نشد!! ');
                }
                $inputs['image'] = $result;
                $media['image'] = $inputs['image'];
            }
            $inputs['user_id'] = Auth::user()->id;
            $inputs['status'] = 1;
            //all mobile numbers are in on format 9** *** ****
            $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);
            $inputs['mobile'] = ltrim($inputs['mobile'], '0');
            $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
            $inputs['mobile'] = str_replace('+98', '', $inputs['mobile']);
            if ($inputs['contact_type'] == 1) {
                $inputs['contact_ways'] = [
                    'mobile'   => $inputs['mobile'],
                    'telegram' => $request->telegram,
                    'whatsapp' => $request->whatsapp,
                ];
            } else {
                $inputs['contact_ways'] = [
                    'mobile'   => $inputs['mobile'],
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

            return to_route('admin.advertise.index')->with('swal-success', 'آگهی با موفقیت ثبت شد');
        } catch (\Exception $e) {
            return redirect()->back()->with('swal-error', 'ثبت آگهی با مشکل مواجه شد');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        $categories = Taxonomy::where('key', 'category')->get();
        $provinces = Province::all();
        return view('admin.adverties.edit', compact('advert', 'categories', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertRequest $request, Advert $advert, ImageService $imageService)
    {

        // try {
            $inputs = $request->all();
            if ($request->hasFile('image')) {
                if (!empty($advert->imageadvert()->path)) {
                    $imageService->deleteDirectoryAndFind($advert->imageadvert()->path['directory']);
                }
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'advert');
                $result = $imageService->createIndexAndSave($request->file('image'));
                if ($result === false) {
                    return to_route('admin.advertise.index')->with('swal-error', 'عکس با موفقیت آپلود نشد!! ');
                }
                $inputs['image'] = $result;
            } else {
                if (!empty($advert->imageadvert()->path)) {
                    $image = $advert->imageadvert()->path;
                    $inputs['image'] = $image;
                }
            }
            //all mobile numbers are in on format 9** *** ****
            $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);
            $inputs['mobile'] = ltrim($inputs['mobile'], '0');
            $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
            $inputs['mobile'] = str_replace('+98', '', $inputs['mobile']);
            if ($inputs['contact_type'] == 1) {
                $inputs['contact_ways'] = [
                    'mobile'   => $inputs['mobile'],
                    'telegram' => $request->telegram,
                    'whatsapp' => $request->whatsapp,
                ];
            } else {
                $inputs['contact_ways'] = [
                    'mobile'   => $inputs['mobile'],
                    'telegram' => null,
                    'whatsapp' => null,
                ];
            }
            $advert->update($inputs);
            $mediable = Media::where('mediable_id', $advert->id)->first();
            $mediable->update([
                'path' =>  $inputs['image']
            ]);
            return to_route('admin.advertise.index')->with('swal-success', 'آگهی با موفقیت ویرایش شد');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('swal-error', 'ثبت آگهی با مشکل مواجه شد');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        $result = $advert->delete();
        return to_route('admin.advertise.index')->with('swal-success', 'آگهی با موفقیت حذف شد');
    }
    public function approved(Advert $advert)
    {
        $advert->status = 1;
        $advert->reject_message = null;
        $result = $advert->save();
        if ($result) {
            return redirect()->back()->with('swal-success', '  وضعیت آگهی با موفقیت تغییر کرد');
        } else {
            return redirect()->back()->with('swal-error', '  وضعیت آگهی با خطا مواجه شد');
        }
    }
    public function waiting(Advert $advert)
    {
        $advert->status = 0;
        $advert->reject_message = null;
        $result = $advert->save();
        if ($result) {
            return redirect()->back()->with('swal-success', '  وضعیت آگهی با موفقیت تغییر کرد');
        } else {
            return redirect()->back()->with('swal-error', '  وضعیت آگهی با خطا مواجه شد');
        }
    }
    public function reject(Request $request, Advert $advert)
    {
        $input['status'] = $advert->status = 2;
        $input['reject_message'] = $request->reject_message;
        $result = $advert->update($input);
        if ($result) {
            return redirect()->back()->with('swal-success', '  وضعیت آگهی با موفقیت تغییر کرد');
        } else {
            return redirect()->back()->with('swal-error', '  وضعیت آگهی با خطا مواجه شد');
        }
    }


    public function search(AdvertSearchRequest $request)
    {
        $search = $request->search;
        $adverties = Advert::where('title', 'like', '%' . $search . '%')->paginate(15)->withQueryString();
        return view('admin.adverties.index', compact('adverties'));
    }
}
