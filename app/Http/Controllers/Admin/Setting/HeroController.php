<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\HeroRequest;
use App\Models\Option;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = Option::where('key', 'hero')->get();
        return view('admin.hero.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeroRequest $request)
    {
        $inputs = $request->all();
        $inputs['value'] = [
            'title'   => $inputs['title'],
            'subtitle' =>  $inputs['subtitle'],
            'description' =>  $inputs['description'],
        ];
        $hero = Option::create([
            'key' => 'hero',
            'value' => $inputs['value']
        ]);
        return to_route('admin.hero.index')->with('swal-success', 'بنر اصلی با موفقیت ثبت شد');
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
    public function edit(Option $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HeroRequest $request, Option $hero)
    {
        $inputs = $request->all();
        $inputs['value'] = [
            'title'   => $inputs['title'],
            'subtitle' =>  $inputs['subtitle'],
            'description' =>  $inputs['description'],
        ];
        $hero->update([
            'key' => 'hero',
            'value' => $inputs['value']
        ]);
        return to_route('admin.hero.index')->with('swal-success', 'بنر اصلی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $hero)
    {
        $result = $hero->delete();
        return to_route('admin.hero.index')->with('swal-success', 'بنر اصلی با موفقیت حذف شد');
    }
}
