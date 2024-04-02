<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Order;
use App\Models\Taxonomy;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $adverties = Advert::all();
        $users = User::all();
        $categories = Taxonomy::where('key', 'category')->get();

        return view('admin.index', compact('orders', 'adverties', 'users', 'categories'));
    }
}
