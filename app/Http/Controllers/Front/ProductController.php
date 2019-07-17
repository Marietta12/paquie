<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;


class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::orderBy('id','desc')->get();
    	return view('front.product.index', compact('products'));
    }

    public function detailProduct()
    {
    	return view('front.product.detailproduct');
    }
}
