<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
Use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductRepositoryInterface
{
	protected $model;

	public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function findProduct($product_id)
    {
        return $this->model->find($product_id);
    }

    public function createProduct($data)
    {
    	// dd($this->model);
        $this->model->user_id = Auth::user()->id;
        $this->model->category_id = $data['inputCategory'];
        $this->model->title = $data['inputTitle'];
        $this->model->description = $data['inputDescription'];
        $this->model->prix = $data['inputPrice'];
        if (isset($data['inputPhoto'])) 
            $this->model->photo = $data['inputPhoto'];        
        $this->model->save();

        return $this->model;
    }

    public function updateProduct($product_id, $data)
    {
        $this->model = $this->model->find($product_id);
        $this->model->user_id = Auth::user()->id;
        $this->model->category_id = $data['inputCategory'];
        $this->model->title = $data['inputTitle'];
        $this->model->description = $data['inputDescription'];
        $this->model->prix = $data['inputPrice'];
        if (isset($data['inputPhoto'])) 
            $this->model->photo = $data['inputPhoto'];        
        $this->model->save();
    }

    public function getAllProduct(){
        return $this->model->with('category')->orderBy('id','desc')->get();
    }

    public function deleteProduct($product_id){
        return $this->model->where('id', $product_id)->delete();
    }

    
}