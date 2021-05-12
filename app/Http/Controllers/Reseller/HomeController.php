<?php

namespace App\Http\Controllers\Reseller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
       $imageProduct =  DB::table('products')
       ->select('product_image')
       ->get();
        //dd($imageProduct);
        return view('resellers.home', ['imageProduct' => $imageProduct]);

    }
}
