<?php

namespace App\Repositories;

use App\Interfaces\CommandRepositoryInterface;
Use App\Command;

class CommandRepository implements CommandRepositoryInterface
{
	protected $model;

	public function __construct(Command $command)
    {
        $this->model = $command;
    }

    public function findCommand($command_id)
    {
        return $this->model->find($command_id);
    }

    public function createCommand($attributes)
    {        
        $this->model->num_command = $attributes['inputNumcommand'];
        $this->model->nbre_product = $attributes['inputNbreProduct'];
        $this->model->total_price = $attributes['inputTotalprice'];        
        $this->model->save();

        return $this->model;
    }

    public function updateCommand($command_id, $data)
    {
        /*dd($data);*/
        $this->model = $this->model->find($command_id);
        //dd($this->model);
        $this->model->num_command = $data['inputNumcommand'];
        $this->model->nbre_product = $data['inputNbreProduct'];
        $this->model->total_price = $data['inputTotalprice']; 
        //dd($attributes['inputNbreProduct']);       
        $this->model->save();
    }

    public function getAllCommand(){
        return $this->model->orderBy('id','desc')->get();
    }

    public function deleteCommand($command_id){
        return $this->model->where('id', $command_id)->delete();
    }

    
}