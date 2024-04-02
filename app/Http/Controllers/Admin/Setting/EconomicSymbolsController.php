<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\EconomicSymbolsRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Media;
use App\Models\Option;
use Illuminate\Http\Request;

class EconomicSymbolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $economicSymbols = Option::where('key', 'economicSymbol')->get();
        return view('admin.economic-symbol.index', compact('economicSymbols'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.economic-symbol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EconomicSymbolsRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        //uploaded image
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'economic-symbols');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return to_route('admin.economic-symbol.index')->with('swal-error', 'عکس با موفقیت آپلود نشد!! ');
            }
            $inputs['image'] = $result;
            $media['image'] = $inputs['image'];
        }
        $inputs['value'] = [
            'title'   => $inputs['title'],
            'link' =>  $inputs['link'],
        ];
        $economicSymbol = Option::create([
            'key' => 'economicSymbol',
            'value' => $inputs['value']
        ]);
        $media = Media::create([
            'mediable_type' => 'App\Models\Option',
            'mediable_id' => $economicSymbol->id,
            'key' => 'economic-symbol',
            'path' => $media['image'],
            'mim_type' => $imageService->getimageFormat()
        ]);
        return to_route('admin.economic-symbol.index')->with('swal-success', 'تنظیمات سایت با موفقیت ثبت شد');
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
    public function edit(Option $economicSymbol)
    {
        return view('admin.economic-symbol.edit', compact('economicSymbol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EconomicSymbolsRequest $request, Option $economicSymbol, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            if (!empty($economicSymbol->imageOption()->path)) {
                $imageService->deleteDirectoryAndFind($economicSymbol->imageOption()->path);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'economic-symbols');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return to_route('admin.economic-symbol.index')->with('swal-error', 'عکس با موفقیت آپلود نشد!! ');
            }
            $inputs['image'] = $result;
        } else {
            if (!empty($economicSymbol->imageOption()->path)) {
                $image = $economicSymbol->imageOption()->path;
                $inputs['image'] = $image;
            }
        }
        $inputs['value'] = [
            'title'   => $inputs['title'],
            'link' =>  $inputs['link'],
            'path' =>  $inputs['image'],

        ];
        $economicSymbol->update([
            'key' => 'economicSymbol',
            'value' => $inputs['value']
        ]);
        return to_route('admin.economic-symbol.index')->with('swal-success', 'تنظیمات سایت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $economicSymbol)
    {
        $result = $economicSymbol->delete();
        return to_route('admin.economic-symbol.index')->with('swal-success', 'تنظیمات سایت با موفقیت حذف شد');
    }
}
