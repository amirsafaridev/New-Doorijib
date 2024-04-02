<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\OrderSearchRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(15)->withQueryString();
        return view('admin.orders.index', compact('orders'));
    }
    public function paid()
    {
        $orders = Order::where('status', 1)->paginate(15)->withQueryString();
        return view('admin.orders.index', compact('orders'));
    }
    public function unpaid()
    {
        $orders = Order::where('status', 2)->paginate(15)->withQueryString();
        return view('admin.orders.index', compact('orders'));
    }

    public function waitingForPay()
    {
        $orders = Order::where('status', 0)->paginate(15)->withQueryString();
        return view('admin.orders.index', compact('orders'));
    }


    public function search(OrderSearchRequest $request)
    {
        $search = $request->search;
        $search = convertPersianToEnglish($search);
        $search = ltrim($search, '0');
        $search = substr($search, 0, 2) === '98' ? substr($search, 2) : $search;
        $search = str_replace('+98', '', $search);
        $user = User::where('mobile', $search)->first();
        $orders = Order::where('user_id', $user->id)->paginate(15)->withQueryString();
        return view('admin.orders.index', compact('orders'));
    }

}
