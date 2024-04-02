<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view("customer.auth.login");
    }
    public function storeLogin(Request $request)
    {
        if (Auth::attempt(['user_name' => $request->username, 'password' => $request->password])) {
            return to_route("home.index")->with('swal-success', 'شما وارد شدید');
        } else {
            return redirect()->back()->with('swal-error', 'رمزعبور یا نام کاربری اشتباه است');
        }
    }
    public function register()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view("customer.auth.register");
    }
    public function storeRegister(RegisterRequest $request)
    {
        $inputs = $request->all();

        $inputs['password'] = Hash::make($request->password);
        if ($inputs['role'] == 0) {
            $inputs['role'] = 0;
        } else {
            $inputs['role'] = 2;
        }
        //all mobile numbers are in on format 9** *** ****
        $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);
        $inputs['mobile'] = ltrim($inputs['mobile'], '0');
        $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
        $inputs['mobile'] = str_replace('+98', '', $inputs['mobile']);
        $inputs['password'] = Hash::make($request->password);
        $user = User::create($inputs);
        Auth::loginUsingId($user->id);
        return to_route('home.index')->with('swal-success', 'ثبت‌ نام شما با موفقیت انجام شد');
    }
    public function logout()
    {
        Auth::logout();
        return to_route('home.index')->with('swal-success', 'شما با موفقیت خارج شدید');
    }
}
