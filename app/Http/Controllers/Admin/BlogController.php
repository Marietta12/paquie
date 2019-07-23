<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlogRepository;
use App\Interfaces\BlogRepositoryInterface;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use App\Service\UploadService;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $blog_repository;
    protected $upload_service;
    public function __construct(BlogRepository $blog_repository ,UploadService $upload){
        $this->blog_repository = $blog_repository;
        $this->upload_service = $upload;
    }

    public function index()
    {
        return view('admin.blog.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = false;
        return view('admin.blog.form',compact('blog'));
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
                $blogs = $this->blog_repository->createBlog($input);
            }catch(\Exception $e){
                dd('error');
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Ajout blog réussie!');
            /*return redirect()->route('category.form');*/
            $blog = false;
            return view("admin/blog/list");
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
        $blog = $this->blog_repository->findBlog($id);
        return view('admin.blog.form',compact('blog'));
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
                $blogs = $this->blog_repository->updateBlog($id,$input);
            }catch(\Exception $e){
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Modification réussie!');
            // return redirect()->route('admin.category.form');
            $blogs = $this->blog_repository->getAllBlog();
            return view('admin.blog.list',compact('blogs'));
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
        $this->blog_repository->deleteBlog($id);
        toastr()->success('Suppression réussie!');
        $blogs = $this->blog_repository->getAllBlog();
        return view('admin.blog.list',compact('blogs'));
    }

     public function uploadImage($request)
    {
        $image_name = null;
        if ($request->hasFile('inputPhoto')) {
            $file = $request->file('inputPhoto');
            try {
                $image_name = $this->upload_service->upload($file, 'image/Blog');
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
        $blogs = $this->blog_repository->getAllBlog();
        $data_tables = DataTables::collection($blogs);
        $data_tables->EditColumn('title', function ($blog) {
                           
        })->EditColumn('title', function ($blog) {
            if(isset($blog->title))    
                return $blog->title;
        })->EditColumn('description', function ($blog) {
            if(isset($blog->description)) 
                return $blog->description;
        })->EditColumn('action', function ($blog) {
            return view("admin.blog.action", ['admin' => $blog]);
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
