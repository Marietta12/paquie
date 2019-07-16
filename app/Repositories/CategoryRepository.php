<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
Use App\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
	protected $model;

	public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function findCategory($category_id)
    {
        return $this->model->find($category_id);
    }

    public function createCategory($data)
    {
    	/*dd($attributes);*/
        $this->model->title = $data['inputTitle'];
        $this->model->description = $data['inputDescription'];
        if (isset($data['inputPhoto'])) 
            $this->model->photo = $data['inputPhoto'];        
        $this->model->save();

        return $this->model;
    }

    public function updateCategory($category_id, $data)
    {
        $this->model = $this->model->find($category_id);
        $this->model->title = $data['inputTitle'];
        $this->model->description = $data['inputDescription'];
        if (isset($data['inputPhoto'])) 
            $this->model->photo = $data['inputPhoto'];        
        $this->model->save();
    }

    public function getAllCategory(){
        return $this->model->orderBy('id','desc')->get();
    }

    public function deleteCategory($category_id){
        return $this->model->where('id', $category_id)->delete();
    }

    
}