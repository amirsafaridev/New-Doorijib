<?php

namespace App\Http\Controllers\Customer\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\User\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view("customer.account.index");
    }
    public function setting()
    {
        $user = Auth::user();
        return view("customer.account.setting", compact("user"));
    }
    public function updateUser(UserRequest $request, User $user)
    {
        $inputs = $request->all();
        if(empty($request->password))
        {
            $user->update([
                "first_name" => $inputs['first_name'],
                "last_name"  => $inputs['last_name'],
                "password"   => $user->password
            ]);
        }
        else{
        $user->update([
            "first_name" => $inputs['first_name'],
            "last_name"  => $inputs['last_name'],
            "password"   => Hash::make($request->password)
        ]);        }
        return to_route('customer.account.setting')->with('swal-success', 'کاربر با موفقیت ویرایش شد');
    }
}
