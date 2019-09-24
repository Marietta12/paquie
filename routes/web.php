<?php
use App\Category;
use App\Product;
use App\Blog;

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
    $categories = Category::orderBy('id','desc')->get();
    $products = Product::orderBy('id','desc')->limit(10)->get();    
    $blogs = Blog::with('user')->orderBy('id','desc')->limit(3)->get();
    Cart::clear();
    return view('front.home.index', compact('categories','products','blogs'));
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

    /*start order_product*/
    Route::resource('blog', 'BlogController');
    Route::get('/get_blog', 'BlogController@getAll')->name('get_blog');
    /*end order_product*/

    /*start faqs*/
    Route::resource('faqs', 'FAQsController');
    Route::get('/get_faqs', 'FAQsController@getAll')->name('get_faqs');
    /*end faqs*/

});

Route::namespace('Front')->group(function () {
    Route::get('/product', 'ProductController@index')->name('front_product');
    Route::get('/detail_product/{id}', 'ProductController@detailproduct')->name('front_detailproduct');
    Route::get('/blog', 'BlogController@index')->name('front_blog');
    Route::get('/detail_blog/{id}', 'BlogController@detailBlog')->name('front_detailblog');
    Route::get('/faqs', 'FAQsController@index')->name('front_faqs');
    Route::get('/contact', 'ContactController@index')->name('front_contact');
    Route::get('/about', 'AboutController@index')->name('front_about');
    Route::get('/cart', 'CartController@index')->name('front_cart');
    Route::get('/cart/liste', 'CartController@lister')->name('front_cart_list');
    Route::get('/cart/add/{id}', 'CartController@add')->name('add_to_cart');
    Route::get('/cart/modifcommand', 'CartController@modifcommand')->name('modifcommand');
    Route::get('/cart/edit', 'CartController@editer')->name('front_cart_edit');
    Route::get('/cart/clean', 'CartController@vider_carte')->name('front_cart_clean');

    Route::resource('carta', 'CartController');
    Route::get('/cart/save', 'CartController@enregistrer')->name('front_cart_save');
    
});

