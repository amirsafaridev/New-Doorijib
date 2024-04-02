<?php

namespace App\Http\Controllers\Admin\SalePlan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SalePlan\SalePlanRequest;
use App\Http\Requests\Admin\SalePlan\SalePlanSearchRequest;
use App\Models\SalePlan;
use Illuminate\Http\Request;

class SalePlanController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesPlan = SalePlan::paginate(15)->withQueryString();
        return view('admin.sale-plan.index', compact('salesPlan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sale-plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalePlanRequest $request)
    {
            $inputs = $request->all();
            $inputs['price'] = convertPersianToEnglish($inputs['price']);
            $salePlan = SalePlan::create($inputs);
            return to_route('admin.sales-plan.index')->with('swal-success', 'پلن‌ با موفقیت ثبت شد');

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
    public function edit(SalePlan $salePlan)
    {
        return view('admin.sale-plan.edit', compact('salePlan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalePlanRequest $request, SalePlan $salePlan)
    {
        $inputs = $request->all();
        $inputs['price'] = convertPersianToEnglish($inputs['price']);
        $salePlan->update($inputs);
        return to_route('admin.sales-plan.index')->with('swal-success', 'پلن‌ با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalePlan $salePlan)
    {
        $result = $salePlan->delete();
        return to_route('admin.sales-plan.index')->with('swal-success', 'پلن‌ با موفقیت حذف شد');
    }

    public function search(SalePlanSearchRequest $request)
    {

        $search = $request->search;

        $salesPlan = SalePlan::where('title','like', '%' . $search . '%')->paginate(15)->withQueryString();
        return view('admin.sale-plan.index', compact('salesPlan'));
    }

}
