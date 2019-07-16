<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('front.home.index');
})->name('home');

Auth::routes();

Route::middleware(['auth'])->namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    /*start profil*/
    Route::resource('user','AdminController');
    Route::get('/edit-profil', 'ProfilController@index')->name('profil');
    Route::get('/get_user', 'AdminController@getAll')->name('get_user');
    Route::get('/user/get-filter', 'AdminController@getFilterList')->name('get-filter');
    Route::post('/post-profil', 'ProfilController@update')->name('post-profil');
    Route::post('/delete/$id', 'AdminController@destroy')->name('delete');
    Route::post('/update/{id}', 'AdminController@update');
    Route::post('user_status', 'AdminController@updateStatus')->name('user_status');
    /*end profil*/

    /*start category*/
    Route::resource('category','CategoryController');
    Route::get('/get_category', 'CategoryController@getAll')->name('get_category');
    /*end category*/

    /*start product*/
    Route::resource('product', 'ProductController');
    Route::get('/get_product', 'ProductController@getAll')->name('get_product');
    /*end product*/

    /*start command*/
    Route::resource('command', 'CommandController');
    Route::get('/get_command', 'CommandController@getAll')->name('get_command');
    /*end command*/

    /*start order_product*/
    Route::resource('order_product', 'OrderProductController');
    Route::get('/get_orderProduct', 'OrderProductController@getAll')->name('get_orderProduct');
    /*end order_product*/

});

Route::namespace('Front')->group(function () {
    Route::get('/product', 'ProductController@index')->name('front_product');
    Route::get('/detail_product', 'ProductController@detailproduct')->name('front_detailproduct');
    Route::get('/blog', 'BlogController@index')->name('front_blog');
    Route::get('/contact', 'ContactController@index')->name('front_contact');
    Route::get('/about', 'AboutController@index')->name('front_about');

});

