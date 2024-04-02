<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Province;
use App\Models\Taxonomy;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $setting = Option::where('key', 'setting')->first();
        $categories = Taxonomy::where('key', 'category')->orWhere('id', $setting->value['category_id_1'])->orWhere('id', $setting->value['category_id_2'])->orWhere('id', $setting->value['category_id_3'])->limit(3)->get();
        $hero = Option::where('key', 'hero')->first();
        return view("customer.home", compact('categories', 'provinces', 'hero', 'setting'));
    }
}
