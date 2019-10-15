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

    public function getAllProductByCategory($category_id){
        return $this->model->with('category')->where('category_id', '=', $category_id)->orderBy('id','desc')->get();
    }

    public function deleteProduct($product_id){
        return $this->model->where('id', $product_id)->delete();
    }

    public function getBlog(){
        return $this->model->orderBy('id','desc')->limit(10)->get();
    }

    public function filterProduct($data){
        $category = $data['all_data']['category'];
        $search_value = isset($data["all_data"]["search_value"]) ? $data["all_data"]["search_value"] : '';
        $price_status = $data['all_data']['price_status'];
        $price_value = $data['all_data']['price_value'];
        //dd($price_status);
        $products = $this->model->where(function($query) use ($category, $search_value, $price_status, $price_value){
            if (isset($category)) {
                $query->where('category_id', '=', $category);
            }
            if ($search_value != '') {
                $query->where('title', 'like', '%'.$search_value.'%');
            }            
            switch ($price_value) {
                case "0-5000":
                    $query->whereBetween('prix', [0, 5000]);
                    break;
                case "5000-10000":
                    $query->whereBetween('prix', [5000, 10000]);
                    break;
                case "10000-20000":
                    $query->whereBetween('prix', [10000, 20000]);
                    break;
                case "20000+":
                    $query->where('prix', '>', 20000);
                    break;
            }
            switch ($price_status) {
                case "price-down-up":
                    $query->orderBy('prix', 'DESC');
                    break;
                case "price-up-down":
                    $query->orderBy('prix', 'ASC');
                    break;
            }
            })->paginate(12);
        return $products;
    }
    
}