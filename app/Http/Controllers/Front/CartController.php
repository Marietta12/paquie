<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderProductRepository;
use App\Interfaces\OrderProductRepositoryInterface;
use App\Product;
use Cart;

class CartController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $order_product_repository;
    public function __construct(OrderProductRepository $order_product_repository){
        $this->order_product_repository = $order_product_repository;

    }
    public function index()
    {
    	return view('front.cart.index');
    } 
    
    public function modifcommand()
    {
        return view('front.product.index');
    }

    public function lister(Request $request)
    {

        /*Cart::clear();
        $product_ids = $request->get('product_ids');
        $product_pics = $request->get('product_pics');
        $commands = [];
        foreach ($product_ids as $key => $product_id) {
            $indx = array_search($product_id, $product_ids);

            $product = Product::find($product_id);
            $add = Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->prix,
                'quantity' => 1,
                'attributes' => [$product->photo]
            ]);

            $command = Cart::get($product_id);
            array_push($commands, $command);
        }*/
    	/*$command_content = Cart::getContent();
    	$product = Product::find($request->get('product_id'));
    	$add = Cart::add([
    		'id' => $product->id,
    		'name' => $product->title,
    		'price' => $product->prix,

    		'quantity' => 1,
            'photo' => $product->photo
    	]);
        $product_ids = $request->get('product_ids');
        $commands = [];
        foreach ($product_ids as $key => $product_id) {
            $command = Cart::get($product_id);
            array_push($commands, $command);
        }*/
/*      $produits = [];
    	$command_content = Cart::getContent();
        for($i = 0; $i < sizeof($command_content); $i++){
            $produits[] = $command_content[$i];
        }
        */        
    	return Cart::getContent();
        /*$view = view('front.cart.modalcart')->render();*/
    }

     public function add(Request $request)
    {

        Cart::clear();
        $product_ids = $request->get('product_ids');
        $product_pics = $request->get('product_pics');
        $commands = [];
        foreach ($product_ids as $key => $product_id) {
            $indx = array_search($product_id, $product_ids);

            $product = Product::find($product_id);
            $add = Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->prix,
                'quantity' => 1,
                'attributes' => [$product->photo]
            ]);

            $command = Cart::get($product_id);
            array_push($commands, $command);
        }
        /*$command_content = Cart::getContent();
        $product = Product::find($request->get('product_id'));
        $add = Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->prix,

            'quantity' => 1,
            'photo' => $product->photo
        ]);
        $product_ids = $request->get('product_ids');
        $commands = [];
        foreach ($product_ids as $key => $product_id) {
            $command = Cart::get($product_id);
            array_push($commands, $command);
        }*/
        
        return [$commands,  Cart::getContent()];
        /*$view = view('front.cart.modalcart')->render();*/
    }

    public function editer(Request $request) {

        $crt_id = $request->get('l_id');
        $crt_qqt = $request->get('nbr');

        $cmd = Cart::get($crt_id);
        $cmd['quantity'] = $crt_qqt;
        //Cart::set($cmd);

        return Cart::getContent();
    }


    public function enregistrer(Request $request){
        $cmd = [
            'product_id'=> $request->get('product_id'),
            'quantity'=>  $request->get('quantity'),
            'price'=> $request->get('price'),
            'total_price'=>  $request->get('total_price'),
            'client_name'=> $request->get('client_name'),
            'client_table'=>  $request->get('client_table')
        ];

        try{
            
            $order_products = $this->order_product_repository->createOrderProduct($cmd);

            return ['msg'=> 'Commande bien reçue !', 'status' => 'ok'];
            
        }catch(\Exception $e){
            //dd($e->getMessage());
            //return Redirect::back()->withInput()->withErrors($e->getMessage());
            return ['msg'=> $e->getMessage(), 'status' => 'ko'];            
        }
    }

    public function vider_carte(){
        Cart::clear();

        return Cart::getContent();
    }


    public function status(Request $request){
        $id = $request->get('_id');
        $val = $request->get('current_val');

        $model = $this->order_product_repository->changeStatusOrderProduct($id, $val);

        return response()->json(['id'=> $id, 'val'=>$val, 'cmd'=>$model]);
        
    }

    

}
