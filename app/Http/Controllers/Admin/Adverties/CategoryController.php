<?php

namespace App\Http\Controllers\Admin\Adverties;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adverties\CategoryRequest;
use App\Http\Requests\Admin\Adverties\CategorySearchRequest;
use App\Models\Taxonomy;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Taxonomy::where('key', 'category')->paginate(15)->withQueryString();
        return view('admin.adverties.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Taxonomy::where('key', 'category')->get();
        return view('admin.adverties.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
            $inputs = $request->all();
            $inputs['key'] = 'category';
            $inputs['value'] = $request->name;
            $category = Taxonomy::create($inputs);
            return to_route('admin.advertise-category.index')->with('swal-success', 'دسته بندی با موفقیت ثبت شد');

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
    public function edit(Taxonomy $category)
    {
        $categories = Taxonomy::where('key', 'category')->get();
        return view('admin.adverties.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Taxonomy $category)
    {
        $inputs = $request->all();
        $inputs['value'] = $request->name;
        $category->update($inputs);
        return to_route('admin.advertise-category.index')->with('swal-success', 'دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxonomy $category)
    {
        $result = $category->delete();
        // foreach($category->adverties->get() as $advert)
        // {
        //     $advert->delete();
        // }
        return to_route('admin.advertise-category.index')->with('swal-success', 'دسته بندی با موفقیت حذف شد');
    }


    public function search(CategorySearchRequest $request)
    {
        $search = $request->search;
        $categories = Taxonomy::where('value','like', '%' . $search . '%')->paginate(15)->withQueryString();
        return view('admin.adverties.category.index', compact('categories'));
    }
}
