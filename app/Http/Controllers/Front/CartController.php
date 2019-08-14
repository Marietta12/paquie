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

        Cart::clear();
        $product_ids = $request->get('product_ids');
        $product_pics = $request->get('product_pics');
        $commands = [];
        foreach ($product_ids as $key => $product_id) {
            $indx = array_search($product_id, $product_ids);

            $product = Product::find($product_id);
            $add = Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->prix,
                'quantity' => 1,
                'attributes' => [$product->photo]
            ]);

            $command = Cart::get($product_id);
            array_push($commands, $command);
        }
    	/*$command_content = Cart::getContent();
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
        }*/
    	

    	return [$commands,  Cart::getContent()];
        /*$view = view('front.cart.modalcart')->render();*/
    }
}
