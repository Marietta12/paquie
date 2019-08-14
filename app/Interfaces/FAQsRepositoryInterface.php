<?php

namespace App\Interfaces;

interface FAQsRepositoryInterface
{
	public function getAllFAQs();
	public function findFAQs($faqs_id);
	public function createFAQs($data);
	public function updateFAQs($faqs_id, $data);
}