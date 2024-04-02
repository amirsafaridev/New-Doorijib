<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Models\Option;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

class SettingController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Option::where('key', 'setting')->get();
        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Taxonomy::where('key', 'category')->get();
        return view('admin.setting.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        $inputs = $request->all();
        $inputs['value'] = [
            'telegram'   => $inputs['telegram'],
            'instagram' =>  $inputs['instagram'],
            'linkedin' =>  $inputs['linkedin'],
            'category_id_1' =>  $inputs['category_id_1'],
            'category_id_2' =>  $inputs['category_id_2'],
            'category_id_3' =>  $inputs['category_id_3'],
            'description' =>  $inputs['description'],
        ];
        $setting = Option::create([
            'key' => 'setting',
            'value' => $inputs['value']
        ]);
        return to_route('admin.setting.index')->with('swal-success', 'تنظیمات سایت با موفقیت ثبت شد');
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
    public function edit(Option $setting)
    {
        $categories = Taxonomy::where('key', 'category')->get();
        return view('admin.setting.edit', compact('setting', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, Option $setting)
    {
        $inputs = $request->all();
        $inputs['value'] = [
            'telegram'   => $inputs['telegram'],
            'instagram' =>  $inputs['instagram'],
            'linkedin' =>  $inputs['linkedin'],
            'category_id_1' =>  $inputs['category_id_1'],
            'category_id_2' =>  $inputs['category_id_2'],
            'category_id_3' =>  $inputs['category_id_3'],
            'description' =>  $inputs['description'],
        ];
        $setting->update([
            'key' => 'setting',
            'value' => $inputs['value']
        ]);
        return to_route('admin.setting.index')->with('swal-success', 'تنظیمات سایت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $setting)
    {
        $result = $setting->delete();
        return to_route('admin.setting.index')->with('swal-success', 'تنظیمات سایت با موفقیت حذف شد');
    }
}
