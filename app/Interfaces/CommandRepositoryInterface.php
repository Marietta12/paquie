<?php

namespace App\Interfaces;

interface CommandRepositoryInterface
{
	public function getAllCommand();
	public function findCommand($command);
	public function createCommand($attributes);
	public function updateCommand($command_id, $data);
}