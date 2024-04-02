<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::where('user_name', $request->user_name)->first();
        if($user && $user->role != 1)
        {
            return to_route('login')->with('swal-error' , 'کاربر ادمین با این شماره وجود ندارد');
        }
        return $next($request);
    }
}
