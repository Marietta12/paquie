<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Interfaces\BlogRepositoryInterface;
use App\Product;
use App\Interfaces\ProductRepositoryInterface;


class BlogController extends Controller
{

	protected $blog_repository;
	protected $product_repository;
    
    public function __construct(BlogRepositoryInterface $blog_repository, ProductRepositoryInterface $product_repository){
        $this->blog_repository = $blog_repository;
        $this->product_repository = $product_repository;
    }

    public function index()
    {
    	$blogs = $this->blog_repository->getAllBlog();
    	$products = $this->product_repository->getBlog();
    	return view('front.blog.index', compact('blogs', 'products'));
    }

    public function detailBlog($id)
    {
 
    	$blog = $this->blog_repository->findBlog($id);
    	return view('front.blog.detailBlog', compact('blog'));
    }
}
