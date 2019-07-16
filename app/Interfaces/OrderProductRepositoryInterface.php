<?php

namespace App\Interfaces;

interface OrderProductRepositoryInterface
{
	public function getAllOrderProduct();
	public function findOrderProduct($order_product);
	public function createOrderProduct($attributes);
	public function updateOrderProduct($order_product_id, $data);
}