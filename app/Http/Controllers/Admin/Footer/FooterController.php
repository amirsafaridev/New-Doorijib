<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Footer\FooterRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Option::where('key', 'footer')->get();
        return view('admin.footer.index', compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(footerRequest $request)
    {
        $inputs = $request->all();
        $inputs['value'] = [
            'title'   => $inputs['title'],
            'link' =>  $inputs['link'],
        ];
        $footer = Option::create([
            'key' => 'footer',
            'value' => $inputs['value']
        ]);
        return to_route('admin.footer.index')->with('swal-success', 'تنظیمات فوتر با موفقیت ثبت شد');
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
    public function edit(Option $footer)
    {
        return view('admin.footer.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FooterRequest $request, Option $footer)
    {
        $inputs = $request->all();
        $inputs['value'] = [
            'title'   => $inputs['title'],
            'link' =>  $inputs['link'],
        ];
        $footer->update([
            'key' => 'footer',
            'value' => $inputs['value']
        ]);
        return to_route('admin.footer.index')->with('swal-success', 'تنظیمات فوتر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $footer)
    {
        $result = $footer->delete();
        return to_route('admin.footer.index')->with('swal-success', 'تنظیمات فوتر با موفقیت حذف شد');
    }
}
