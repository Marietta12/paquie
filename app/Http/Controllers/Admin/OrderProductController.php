<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderProductRepository;
use App\Interfaces\OrderProductRepositoryInterface;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use App\Service\UploadService;
use Illuminate\Support\Facades\Validator;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $order_product_repository;
    protected $upload_service;
    public function __construct(OrderProductRepository $order_product_repository ,UploadService $upload){
        $this->order_product_repository = $order_product_repository;
        $this->upload_service = $upload;

    }

    public function index()
    {
         return view('admin.order_product.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order_product = false;         
        return view('admin.order_product.form',compact('order_product'));
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
            'inputNumorder_product' => 'required',        
            'inputIdProduct' => 'required',
            'inputQuantity' => 'required',
            'inputPrice' => 'required',
            'inputSousTotal' => 'required'

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // dd($validator);
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{

                // $input = $this->uploadImage($request);
                $order_products = $this->order_product_repository->createOrderProduct($request);
            }catch(\Exception $e){
                dd($e->getMessage());
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Ajout ordre de produit réussie!');
            /*return redirect()->route('Command.form');*/
            $order_product = false;
            return view("admin/order_product/list");
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
        $order_product = $this->order_product_repository->findOrderProduct($id);
        return view('admin.order_product.form',compact('order_product'));
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
            'inputNumorder_product' => 'required',        
            'inputIdProduct' => 'required',
            'inputQuantity' => 'required',
            'inputPrice' => 'required',
            'inputSousTotal' => 'required'
        );        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{
                $input= $request->all();
                // $input = $this->uploadImage($request);
                $order_products = $this->order_product_repository->updateOrderProduct($id, $input);
            }catch(\Exception $e){
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Modification réussie!');
            // return redirect()->route('order_product.form');
            $order_products = $this->order_product_repository->getAllOrderProduct();
            return view('admin.order_product.list',compact('order_products'));
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
        $this->order_product_repository->deleteOrderProduct($id);
        toastr()->success('Suppression réussie!');
        $order_products = $this->order_product_repository->getAllOrderProduct();
        return view('admin.order_product.list',compact('order_products'));
    }

    public function getAll(){
        $order_products = $this->order_product_repository->getAllOrderProduct();
        //$data_tables = collect([]);
        //return view('admin.user.list',compact('users'));
        $data_tables = DataTables::collection($order_products);
        $data_tables->EditColumn('inputNumcommand', function ($order_product) {
                           
        })->EditColumn('inputNumcommand', function ($order_product) {
            if(isset($order_product->inputNumcommand))    
                return $order_product->inputNumcommand;
        })->EditColumn('inputNbreProduct', function ($order_product) {
            if(isset($order_product->inputNbreProduct)) 
                return $order_product->inputNbreProduct;
        })->EditColumn('inputTotalprice', function ($order_product) {
        if(isset($order_product->inputTotalprice)) 
            return $order_product->inputTotalprice;        
        })->EditColumn('action', function ($order_product) {
            return view("admin.order_product.action", ['admin' => $order_product]);
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
