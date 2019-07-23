<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Blog;
use Illuminate\Support\Facades\Auth;

class BlogRepository implements BlogRepositoryInterface
{
	protected $model;

	public function __construct(Blog $blog)
    {
        $this->model = $blog;
    }

    public function findBlog($blog_id)
    {
        return $this->model->find($blog_id);
    }

    public function createBlog($data)
    {
    	$this->model->user_id = Auth::user()->id;
        $this->model->title = $data['inputTitle'];
        $this->model->description = $data['inputDescription'];
        if (isset($data['inputPhoto'])) 
            $this->model->photo = $data['inputPhoto'];        
        $this->model->save();

        return $this->model;
    }

    public function updateBlog($blog_id, $data)
    {
        $this->model = $this->model->find($blog_id);
        $this->model->user_id = Auth::user()->id;
        $this->model->title = $data['inputTitle'];
        $this->model->description = $data['inputDescription'];
        if (isset($data['inputPhoto'])) 
            $this->model->photo = $data['inputPhoto'];        
        $this->model->save();
    }

    public function getAllBlog(){
        return $this->model->orderBy('id','desc')->get();
    }

    public function deleteBlog($blog_id){
        return $this->model->where('id', $blog_id)->delete();
    }

    
}