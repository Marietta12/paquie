<?php

namespace App\Repositories;

use App\Interfaces\FAQsRepositoryInterface;
use App\FAQs;

class FAQsRepository implements FAQsRepositoryInterface
{
	protected $model;

	public function __construct(FAQs $faqs)
    {
        $this->model = $faqs;
    }

    public function findFAQs($faqs_id)
    {
        return $this->model->find($faqs_id);
    }

    public function createFAQs($data)
    {
        $this->model->questions = $data['questions'];
        $this->model->answers = $data['answers'];               
        $this->model->save();

        return $this->model;
    }

    public function updateFAQs($faqs_id, $data)
    {
        $this->model = $this->model->find($faqs_id);
        $this->model->questions = $data['questions'];
        $this->model->answers = $data['answers'];                  
        $this->model->save();
    }

    public function getAllFAQs(){
        return $this->model->orderBy('id','desc')->get();
    }

    public function deleteFAQs($faqs_id){
        return $this->model->where('id', $faqs_id)->delete();
    }    
}