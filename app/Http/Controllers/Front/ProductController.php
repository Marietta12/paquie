<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
    	return view('front.product.index');
    }

    public function detailProduct()
    {
    	return view('front.product.detailproduct');
    }
}
