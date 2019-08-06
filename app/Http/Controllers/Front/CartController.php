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
    	$command_content = Cart::getContent();
    	$product = Product::find($request->get('product_id'));
    	$add = Cart::add([
    		'id' => $product->id,
    		'name' => $product->title,
    		'price' => $product->prix,
    		'quantity' => 1,
            'photo' => $product->photo
    	]);
        $product_ids = $request->get('product_ids');
        $commands = [];
        foreach ($product_ids as $key => $product_id) {
            $command = Cart::get($product_id);
            array_push($commands, $command);
        }
    	/*$view = view('front.cart.modalcart')->render();*/

    	return [$commands, $command_content];
    }
}
