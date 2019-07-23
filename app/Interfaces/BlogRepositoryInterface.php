<?php

namespace App\Interfaces;

interface BlogRepositoryInterface
{
	public function getAllBlog();
	public function findBlog($blog);
	public function createBlog($data);
	public function updateBlog($blog_id,$data);
}