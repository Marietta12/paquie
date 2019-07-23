<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $user_repository;
    protected $product_repository;
    
    public function __construct(UserRepositoryInterface $user_repository, ProductRepositoryInterface $product_repository){
        $this->user_repository = $user_repository;
        $this->product_repository = $product_repository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = $this->user_repository->getAllUser();
        $products = $this->product_repository->getAllProduct();
        return view('admin.dashboard.index', compact('users','products'));
    }
}
