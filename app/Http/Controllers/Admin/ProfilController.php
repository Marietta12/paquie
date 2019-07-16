<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\UploadService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\UserRepositoryInterface;
//use App\Repository\UserRepository;

class ProfilController extends Controller
{

    protected $user_repository;
	protected $upload_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user_repository,UploadService $upload)
    {
        $this->middleware('auth');
        $this->user_repository = $user_repository;
        $this->upload_service = $upload;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$user = Auth::user();
        return view('admin.user.index', compact('user'));
    }

    public function update(Request $request)
    {
        $rules = array(    
            'inputName' => 'required',        
            'inputPhone' => 'required',
            'inputEmail' => 'required'
        );        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            try{
                $image_name = null;
                if ($request->hasFile('inputPhoto')) {
                    $file = $request->file('inputPhoto');
                    try {
                        $image_name = $this->upload_service->upload($file, 'image/Admin/Profil');
                    } catch (\Exception $e) {
                        flash()->error($e->getMessage());
                        return Redirect::back();
                    }
                }
                $input = $request->all();
                $input['inputPhoto'] = $image_name;
                $id= $request['id'];
                $users = $this->user_repository->updateUser($id,$input);
            }catch(\Exception $e){
                return Redirect::back()->withInput()->withErrors($e->getMessage());
            }
            toastr()->success('Modification réussie!');
            return redirect()->back();
        }
    }
}