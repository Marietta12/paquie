<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
	public function getAllUser();
	public function findUser($user_id);
	public function createUser($data);
	public function updateUser($user_id, $data);
}