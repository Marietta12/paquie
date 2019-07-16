<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use App\Service\UploadService;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $category_repository;
    protected $upload_service;
    public function __construct(CategoryRepository $category_repository ,UploadService $upload){
        $this->category_repository = $category_repository;
        $this->upload_service = $upload;
    }
    
    public function index()
    {
        return view('admin.category.list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = false;
        return view('admin.category.form',compact('category'));
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
            'inputTitle' => 'required',        
            'inputDescription' => 'required',
            'inputPhoto' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{

                $input = $this->uploadImage($request);
                $categories = $this->category_repository->createCategory($input);
            }catch(\Exception $e){
                dd('error');
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Ajout catégories réussie!');
            /*return redirect()->route('category.form');*/
            $category = false;
            return view("admin/category/list");
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
        $category = $this->category_repository->findCategory($id);
        return view('admin.category.form',compact('category'));
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
        //
        $rules = array(    
            'inputTitle' => 'required',        
            'inputDescription' => 'required',
            'inputPhoto' => 'required'
        );        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{
                //$input= $request->all();
                $input = $this->uploadImage($request); 
                $categories = $this->category_repository->updateCategory($id,$input);
            }catch(\Exception $e){
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Modification réussie!');
            // return redirect()->route('admin.category.form');
            $categories = $this->category_repository->getAllCategory();
            return view('admin.category.list',compact('categories'));
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
        //
        $this->category_repository->deleteCategory($id);
        toastr()->success('Suppression réussie!');
        $categories = $this->category_repository->getAllCategory();
        return view('admin.category.list',compact('categories'));
    }
    public function uploadImage($request)
    {
        $image_name = null;
        if ($request->hasFile('inputPhoto')) {
            $file = $request->file('inputPhoto');
            try {
                $image_name = $this->upload_service->upload($file, 'image/Categories');
            } catch (\Exception $e) {
                flash()->error($e->getMessage());
                return Redirect::back();
            }
        }
        $input = $request->all();
        $input['inputPhoto'] = $image_name;
        return $input;
    }

    public function getAll(){
        $categories = $this->category_repository->getAllCategory();
        //$data_tables = collect([]);
        //return view('admin.user.list',compact('users'));
        $data_tables = DataTables::collection($categories);
        $data_tables->EditColumn('title', function ($category) {
                           
        })->EditColumn('title', function ($category) {
            if(isset($category->title))    
                return $category->title;
        })->EditColumn('description', function ($category) {
            if(isset($category->description)) 
                return $category->description;
        })->EditColumn('action', function ($category) {
            return view("admin.category.action", ['admin' => $category]);
        });
        return $data_tables->rawColumns(['title','description','action'])->make(true);
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




