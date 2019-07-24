<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Interfaces\BlogRepositoryInterface;


class BlogController extends Controller
{

	protected $blog_repository;
    
    public function __construct(BlogRepositoryInterface $blog_repository){
        $this->blog_repository = $blog_repository;
    }

    public function index()
    {
    	$blogs = $this->blog_repository->getAllBlog();
    	return view('front.blog.index', compact('blogs'));
    }

    public function detailBlog($id)
    {
    	$blog = $this->blog_repository->findBlog($id);
    	return view('front.blog.detailBlog', compact('blog'));
    }
}
