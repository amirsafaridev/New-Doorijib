<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UserRequest;
use App\Models\User;
use App\Http\Requests\Admin\Users\SearchRequest as UsersSearchRequest;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = User::where('role', 2)->paginate(15)->withQueryString();
        return view('admin.users.employer.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.employer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
            $inputs = $request->all();

            $inputs['password'] = Hash::make($request->password);
            $inputs['role'] = 2;
            //all mobile numbers are in on format 9** *** ****
            $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);
            $inputs['mobile'] = ltrim($inputs['mobile'], '0');
            $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
            $inputs['mobile'] = str_replace('+98', '', $inputs['mobile']);
            $inputs['password'] = Hash::make($request->password);
            $admin = User::create($inputs);
            return to_route('admin.users.employer-users.index')->with('swal-success', 'کاربر ادمین با موفقیت ثبت شد');

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
    public function edit(User $employer)
    {
        return view('admin.users.employer.edit', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $employer)
    {
        $inputs = $request->all();
        //all mobile numbers are in on format 9** *** ****
        $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);
        $inputs['mobile'] = ltrim($inputs['mobile'], '0');
        $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
        $inputs['mobile'] = str_replace('+98', '', $inputs['mobile']);
        $employer->update($inputs);
        return to_route('admin.users.employer-users.index')->with('swal-success', 'کاربر ادمین با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employer)
    {
        $result = $employer->delete();
        return to_route('admin.users.employer-users.index')->with('swal-success', 'کاربر ادمین با موفقیت حذف شد');
    }

    public function search(UsersSearchRequest $request)
    {

        $search = $request->search;
        $search = convertPersianToEnglish($search);
        $search = ltrim($search, '0');
        $search = substr($search, 0, 2) === '98' ? substr($search, 2) : $search;
        $search = str_replace('+98', '', $search);
        $employers = User::where('mobile', $search)->orWhere('user_name','like', '%' . $search . '%')->orWhere('first_name','like', '%' . $search . '%')->orWhere('last_name','like', '%' . $search . '%')->paginate(15)->withQueryString();
        return view('admin.users.employer.index', compact('employers'));
    }

}
