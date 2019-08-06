<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function index()
    {
    	return view('front.cart.index');
    }

    public function add(Request $request)
    {
    	$command_id = Cart::getContent()->count();
    	$product = Product::find($request->get('product_id'));
    	$add = Cart::add([
    		'id' => $product->id,
    		'name' => $product->title,
    		'price' => $product->prix,
    		'quantity' => 1
    	]);
    	$commands = Cart::getContent();
    	$command_number = Cart::getContent()->count();
    	// $view = view('front.cart.modalcart')->render();
    	return ['commands' => $commands, 'command_number' => $command_number];
    }
}
