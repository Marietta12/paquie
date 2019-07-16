<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
	public function getAllCategory();
	public function findCategory($category);
	public function createCategory($attributes);
	public function updateCategory($category_id, $data);
}