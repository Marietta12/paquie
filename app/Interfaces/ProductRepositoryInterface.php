<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProduct();
    public function findProduct($product);
    public function createProduct($attributes);
    public function updateProduct($product_id, $data);
    public function filterProduct($data);
}