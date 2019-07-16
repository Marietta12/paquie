<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CommandRepository;
use App\Interfaces\CommandRepositoryInterface;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use App\Service\UploadService;
use Illuminate\Support\Facades\Validator;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $command_repository;
    protected $upload_service;
    public function __construct(CommandRepository $command_repository ,UploadService $upload){
        $this->command_repository = $command_repository;
        $this->upload_service = $upload;

    }

    public function index()
    {
         return view('admin.command.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $command = false;         
        return view('admin.command.form',compact('command'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(    
            'inputNumcommand' => 'required',        
            'inputNbreProduct' => 'required',
            'inputTotalprice' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // dd($validator);
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{

                // $input = $this->uploadImage($request);
                $commands = $this->command_repository->createCommand($request);
            }catch(\Exception $e){
                dd($e->getMessage());
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Ajout commande réussie!');
            /*return redirect()->route('Command.form');*/
            $command = false;
            return view("admin/command/list");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $command = $this->command_repository->findCommand($id);
        return view('admin.command.form',compact('command'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(    
            'inputNumcommand' => 'required',        
            'inputNbreProduct' => 'required',
            'inputTotalprice' => 'required'
        ); 

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{
                $input= $request->all();
                //$input = $this->uploadImage($request); 
                $commands = $this->command_repository->updateCommand($id, $input);
            }catch(\Exception $e){
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Modification réussie!');
            //return redirect()->route('command.form');
            $commands = $this->command_repository->getAllCommand();
            return view('admin.command.list',compact('commands'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->command_repository->deleteCommand($id);
        toastr()->success('Suppression réussie!');
        $commands = $this->command_repository->getAllCommand();
        return view('admin.command.list',compact('commands'));
    }

    public function getAll(){
        $commands = $this->command_repository->getAllCommand();
        //$data_tables = collect([]);
        //return view('admin.user.list',compact('users'));
        $data_tables = DataTables::collection($commands);
        $data_tables->EditColumn('inputNumcommand', function ($command) {
                           
        })->EditColumn('inputNumcommand', function ($command) {
            if(isset($command->inputNumcommand))    
                return $command->inputNumcommand;
        })->EditColumn('inputNbreProduct', function ($command) {
            if(isset($command->inputNbreProduct)) 
                return $command->inputNbreProduct;
        })->EditColumn('inputTotalprice', function ($command) {
        if(isset($command->inputTotalprice)) 
            return $command->inputTotalprice;        
        })->EditColumn('action', function ($command) {
            return view("admin.command.action", ['admin' => $command]);
        });
        return $data_tables->rawColumns(['inputNumcommand','inputNbreProduct', 'inputTotalprice','action'])->make(true);
    }

    public function getFilterList()
    {
        $brand_array = Session::get('brand_array');
        if(!empty($brand_array)){
            $brand_array = array_unique($brand_array);
            asort($brand_array);
        }
        return response()->json(['brand_array' => $brand_array]);
    }
}
