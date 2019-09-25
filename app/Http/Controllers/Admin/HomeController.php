<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\OrderProductRepositoryInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $user_repository;
    protected $product_repository;
    protected $order_product_repository;
    
    public function __construct(UserRepositoryInterface $user_repository, ProductRepositoryInterface $product_repository, OrderProductRepositoryInterface $order_product_repository ){
        $this->user_repository = $user_repository;
        $this->product_repository = $product_repository;
        $this->order_product_repository = $order_product_repository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users = $this->user_repository->getAllUser();
        $products = $this->product_repository->getAllProduct();
        if($request->get('traitement') != null){
            $status = $request->get('traitement');
            $orders = $this->order_product_repository->getFilteredOrderProduct($status);
        }else {
            $orders = $this->order_product_repository->getAllOrderProduct();
        }
        
        $allorders = [];
        foreach ($orders as $key => $order) {
            $ids = explode(";", $order->product_id);
            $quantities = explode(";", $order->quantity);
            $products = [];
            $qtts = [];
            foreach ($ids as $k => $id) {
                if(strlen($id) > 0){
                    $product = $this->product_repository->findProduct($id);
                    if(!Empty($product)){
                        $products [] = $product;
                        $qtts [] = $quantities[$k]; 
                    }
                }
            }

            $allorders[] = ['order'=>$order, 'products'=>$products, 'quantities'=>$qtts];

        }
        return view('admin.dashboard.index', compact('users','products', 'orders', 'allorders'));
    }
}
