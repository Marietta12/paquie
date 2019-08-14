<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FAQsRepository;
use App\Interfaces\FAQsRepositoryInterface;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class FAQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $faqs_repository;    
    public function __construct(FAQsRepository $faqs_repository){
        $this->faqs_repository = $faqs_repository;        
    }

    public function index()
    {
        return view('admin.faqs.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faqs = false;
        return view('admin.faqs.form',compact('faqs'));
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
            'questions' => 'required',        
            'answers' => 'required'            
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{
                $faqss = $this->faqs_repository->createFAQs($request);
            }catch(\Exception $e){
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Ajout FAQs réussie!');            
            $faqs = false;
            return view("admin/faqs/list");
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
        $faqs = $this->faqs_repository->findFAQs($id);
        return view('admin.faqs.form',compact('faqs'));
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
            'questions' => 'required',        
            'answers' => 'required'
        );        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{ 
                $faqss = $this->faqs_repository->updateFAQs($id,$request);
            }catch(\Exception $e){
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Modification réussie!');            
            $faqss = $this->faqs_repository->getAllFAQs();
            return view('admin.faqs.list',compact('faqss'));
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
        $this->faqs_repository->deleteFAQs($id);
        toastr()->success('Suppression réussie!');
        $faqss = $this->faqs_repository->getAllFAQs();
        return view('admin.faqs.list',compact('faqss'));
    }

    public function getAll(){
        $faqss = $this->faqs_repository->getAllFAQs();
        $data_tables = DataTables::collection($faqss);
        $data_tables->EditColumn('questions', function ($faqs) {
            if(isset($faqs->questions))
                 return $faqs->questions;                                           
        })->EditColumn('answers', function ($faqs) {
            if(isset($faqs->answers)) 
                return $faqs->answers;
        })->EditColumn('action', function ($faqs) {
            return view("admin.faqs.action", ['admin' => $faqs]);
        });
        return $data_tables->rawColumns(['questions','answers','action'])->make(true);
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
