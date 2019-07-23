<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use App\Service\UploadService;
use Illuminate\Support\Facades\Validator;
//use DigitalDrifter\LaravelChromeLogger\LaravelChromeLogger;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $product_repository;
    protected $upload_service;
    public function __construct(ProductRepository $product_repository ,UploadService $upload ,CategoryRepository $category_repository){
        $this->product_repository = $product_repository;        
        $this->category_repository = $category_repository;
        $this->upload_service = $upload;
        
       }

    public function index()
    {
        return view('admin.product.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $product = false;
         $categorys = $this->category_repository->getAllCategory();
        return view('admin.product.form',compact('product', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('tonga');
        $rules = array(    
            'inputTitle' => 'required',        
            'inputDescription' => 'required',
            'inputPrice' => 'required',
            'inputPhoto' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // dd($validator);
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{

                $input = $this->uploadImage($request);
                $products = $this->product_repository->createProduct($input);
            }catch(\Exception $e){
                dd($e->getMessage());
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Ajout produits réussie!');
            /*return redirect()->route('product.form');*/
            $product = false;
            return view("admin/product/list");
        }
    }

    /**m
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
         $product = $this->product_repository->findProduct($id);
         $categorys = $this->category_repository->getAllCategory();
        return view('admin.product.form',compact('product','categorys'));
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
            'inputPrice' => 'required',
            'inputPhoto' => 'required'
        );        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{
                //$input= $request->all();
                $input = $this->uploadImage($request); 
                $products = $this->product_repository->updateProduct($id,$input);
            }catch(\Exception $e){
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Modification réussie!');
            // return redirect()->route('product.form');
            $products = $this->product_repository->getAllProduct();
            return view('admin.product.list',compact('products'));
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
        $this->product_repository->deleteProduct($id);
        toastr()->success('Suppression réussie!');
        $products = $this->product_repository->getAllProduct();
        return view('admin.product.list',compact('products'));
    }

    public function uploadImage($request)
    {
        $image_name = null;
        if ($request->hasFile('inputPhoto')) {
            $file = $request->file('inputPhoto');
            try {
                $image_name = $this->upload_service->upload($file, 'image/Products');
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
        //LaravelChromeLogger::log("On est dans la fonction getAll()");
        $products = $this->product_repository->getAllProduct();
        //LaravelChromeLogger::log($product);
        //$data_tables = collect([]);
        //return view('admin.user.list',compact('users'));
        $data_tables = DataTables::collection($products);
        $data_tables/*->EditColumn('title', function ($product) {
                           
        })*/->EditColumn('title', function ($product) {
            if(isset($product->title))    
                return $product->title;
        })->EditColumn('description', function ($product) {
            if(isset($product->description)) 
                return $product->description;
        })->EditColumn('prix', function ($product) {
        if(isset($product->prix)) 
            return $product->prix;
        })->EditColumn('category_id', function ($product) {
            //dd($product->category->title);
            if(isset($product->category->title))
                return $product->category->title;
        })->EditColumn('action', function ($product) {
            return view("admin.product.action", ['admin' => $product]);
        });
        return $data_tables->rawColumns(['title','description', 'prix', 'category_id','action'])->make(true);
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
