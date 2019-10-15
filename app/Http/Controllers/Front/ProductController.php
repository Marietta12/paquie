<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Interfaces\ProductRepositoryInterface;


class ProductController extends Controller
{

	protected $product_repository;
    
    public function __construct(ProductRepositoryInterface $product_repository){
        $this->product_repository = $product_repository;
    }
    
    public function index()
    {
    	$products = $this->product_repository->getAllProduct();
    	return view('front.product.index', compact('products'));
    }

    public function getByCategory($category_id)
    {
        //dd($category_id);
        $products = $this->product_repository->getAllProductByCategory($category_id);
        return view('front.product.index', compact('products'));
    }

    public function detailProduct($id)
    {
        $product = $this->product_repository->findProduct($id);
    	return view('front.product.detailproduct',compact('product'));
    }

    public function filterProduct(Request $request)
    {
        $products = $this->product_repository->filterProduct($request->all());
        //return response()->json(['products'=>$products]);
        return view('front.product.show-all-product', compact('products'));
    }
}
