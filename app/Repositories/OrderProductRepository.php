<?php

namespace App\Repositories;

use App\Interfaces\OrderProductRepositoryInterface;
Use App\OrderProduct;

class OrderProductRepository implements OrderProductRepositoryInterface
{
    protected $model;

    public function __construct(OrderProduct $order_product)
    {
        $this->model = $order_product;
    }

    public function findOrderProduct($order_product_id)
    {
        return $this->model->find($order_product_id);
    }

    public function createOrderProduct($data)
    {        
        
        $this->model->product_id = $data['product_id'];
        $this->model->quantity = $data['quantity'];
        $this->model->price = $data['price'];
        $this->model->total_price = $data['total_price'];
        $this->model->client_name = $data['client_name'];
        $this->model->table_client_nbr = $data['client_table'];
                
        $this->model->save();

        return $this->model;
    }

    public function updateOrderProduct($order_product_id, $data)
    {
        $this->model = $this->model->find($order_product_id);
        $this->model->order_id = $data['inputNumorder_product'];
        $this->model->product_id = $data['inputIdProduct'];
        $this->model->quantity = $data['inputQuantity'];
        $this->model->price = $data['inputPrice'];
        $this->model->sous_total = $data['inputSousTotal'];        
        $this->model->save();
        return $this->model;
    }

    public function getAllOrderProduct(){
        return $this->model->orderBy('id','desc')->get();
    }

    public function deleteOrderProduct($order_product_id){
        return $this->model->where('id', $order_product_id)->delete();
    }

    
}