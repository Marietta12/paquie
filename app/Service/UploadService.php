<?php
namespace App\Service;

use Carbon\Carbon;

Class UploadService
{
    const IMAGE_UPLOAD_PATH = 'upload';
    const THUMB_PATH = 'thumb';
    public function __construct()
    {
    }
    public function upload($file,$path, $append_timestamp = true)
    {
        //dd($file);
//         $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
// 		if($append_timestamp){
// 			$image_name = $timestamp . '-' . $file->getClientOriginalName();
// 		} else {
// 			$image_name = $file->getClientOriginalName();
// 		}
// 		$image_name = str_replace([' ', ':'], '-', $image_name);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 40; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $parts = explode('.', $file->getClientOriginalName());
        $image_name = $randomString.'.'.$parts[sizeof($parts) - 1];
        
        $file->move(public_path() .'/'.$path , $image_name);
        return $image_name;
    }

    public function uploadSlider($file,$path, $append_timestamp = true)
    {
        //dd($file);
        // $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        // if($append_timestamp){
        //     $image_name = $timestamp . '-' . $file->getClientOriginalName();
        // } else {
        //     $image_name = $file->getClientOriginalName();
        // }
        // $image_name = str_replace([' ', ':'], '-', $image_name);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 40; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $parts = explode('.', $file->getClientOriginalName());
        $image_name = $randomString.'.'.$parts[sizeof($parts) - 1];
        
        $img = \Image::make($file->getRealPath());
        $img->resize(1080, 1920);
        $thumb_path = public_path() .'/'.$path;
        if(!\File::isDirectory($thumb_path)){
            \File::makeDirectory($thumb_path);
        }
        $img->save($thumb_path.'/'.$image_name);
        
        //$file->move(public_path() .'/'.$path , $image_name);
        return $image_name;
    }

    public function uploadMultiple($file,$path, $append_timestamp = true){
        $image = [];

        for ($i=0; $i < sizeof($file); $i++) { 
            // $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            // if($append_timestamp){
            //     $image_name = $timestamp . '-' . $file[$i]->getClientOriginalName();
            // } else {
            //     $image_name = $file[$i]->getClientOriginalName();
            // }
            
            // $image_name = str_replace([' ', ':'], '-', $image_name);
            
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($j = 0; $j < 40; $j++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $parts = explode('.', $file[$i]->getClientOriginalName());
            $image_name = $randomString.'.'.$parts[sizeof($parts) - 1];
            
            if ($path == "upload/product"){
                $img = \Image::make($file[$i]->getRealPath());
                $img->resize(1080, 582);
                $thumb_path = public_path() .'/'.$path;
                if(!\File::isDirectory($thumb_path)){
                    \File::makeDirectory($thumb_path);
                }
                $img->save($thumb_path.'/'.$image_name);
            } else {
                $file[$i]->move(public_path() .'/'.$path , $image_name);
            }
            
            array_push($image, $image_name);
        }
         return $image;
    }
}