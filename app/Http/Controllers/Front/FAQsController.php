<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FAQs;
use App\Interfaces\FAQsRepositoryInterface;

class FAQsController extends Controller
{

	protected $faqs_repository;
    
    public function __construct(FAQsRepositoryInterface $faqs_repository){
        $this->faqs_repository = $faqs_repository;
    }

	public function index()
	{
		$faqss = $this->faqs_repository->getAllFAQs();		
    	return view('front.faqs.index' ,compact('faqss'));		
	}
}
