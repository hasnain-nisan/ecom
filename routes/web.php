<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('districts/{id}', function ($id)
{
  return json_encode(App\District::where('division_id', $id)->orderby('priority', 'asc')->get());
});



//all pages routes like homepage, contact etc
Route::get('/index', 'PageController@index')->name('index');

//checkout route
route::group(['prefix' => 'checkout'], function() {
    Route::get('/', 'CheckoutController@index')->name('checkout');
    Route::post('/store', 'CheckoutController@store')->name('checkout.store');
});

//cart routes
route::group(['prefix' => 'carts'], function() {
    Route::get('/', 'CartsController@index')->name('carts');
    Route::post('/store', 'CartsController@store')->name('carts.store');
    Route::post('/update/{id}', 'CartsController@update')->name('carts.update');
    Route::post('/store/{id}', 'CartsController@delete')->name('carts.delete');
});

//frontend user profile, update profile Etc.
route::group(['prefix' => 'user'], function() {
    Route::get('/userdashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('/viewprofile/{id}', 'UserController@viewProfile')->name('profile.view');
    Route::get('/getdistricts/{id}', 'UserController@getDistricts')->name('getdistricts');
    Route::get('/edit/{id}', 'UserController@edit')->name('profile.edit');
    Route::post('/update/{id}', 'UserController@update')->name('profile.update');

    Route::get('/token/{token}', 'Auth\userVerificationController@verify')->name('user.verification');

});

//all frontend product route like displaying all products, show exact product etc
route::group(['prefix' => 'products'], function() {
    Route::get('/', 'ProductController@products')->name('products');
    Route::get('/{slug}', 'ProductController@show')->name('product.show');
    Route::get('/search', 'PageController@search')->name('search');
});


//all frontend category routes
route::group(['prefix' => 'categories'], function() {
    Route::get('/{id}', 'CategoryController@show')->name('category.show');
});



//admin pages routes
route::group(['prefix'=>'admin'], function(){
  Route::get('/', 'AdminController@index')->name('admin.index');

  //Admin Login route
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login/submit', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  //admin password reset email send
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

  // admin password reset
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');

  route::group(['prefix'=>'order'], function(){
    Route::get('/manage', 'AdminOrderController@order_manage')->name('admin.order.manage');
    Route::get('/show/{id}', 'AdminOrderController@order_show')->name('admin.order.show');
    Route::post('/delete/{id}', 'AdminOrderController@order_delete')->name('admin.order.delete');
    Route::post('/paid/{id}', 'AdminOrderController@order_paid')->name('admin.order.paid');
    Route::post('/completed/{id}', 'AdminOrderController@order_completed')->name('admin.order.completed');
  });

 //admin products routes
  route::group(['prefix'=>'product'], function(){
    Route::get('/create', 'AdminProductController@product_create')->name('admin.product.create');
    Route::get('/manage', 'AdminProductController@product_manage')->name('admin.product.manage');
    Route::get('/edit/{id}', 'AdminProductController@product_edit')->name('admin.product.edit');
    Route::post('/store', 'AdminProductController@product_store')->name('admin.product.store');
    Route::post('/update/{id}', 'AdminProductController@product_update')->name('admin.product.update');
    Route::post('/delete/{id}', 'AdminProductController@product_delete')->name('admin.product.delete');
  });

//admin category Routes
route::group(['prefix'=>'category'], function(){
  Route::get('/create', 'AdminCategoryController@create')->name('admin.category.create');
  Route::get('/manage', 'AdminCategoryController@manage')->name('admin.category.manage');
  Route::get('/edit/{id}', 'AdminCategoryController@edit')->name('admin.category.edit');
  Route::post('/store', 'AdminCategoryController@store')->name('admin.category.store');
  Route::post('/update/{id}', 'AdminCategoryController@update')->name('admin.category.update');
  Route::post('/delete/{id}', 'AdminCategoryController@delete')->name('admin.category.delete');
});

//admin brand routes
route::group(['prefix'=>'brand'], function(){
  Route::get('/create', 'BrandController@create')->name('admin.brand.create');
  Route::get('/manage', 'BrandController@manage')->name('admin.brand.manage');
  Route::get('/edit/{id}', 'BrandController@edit')->name('admin.brand.edit');
  Route::post('/store', 'BrandController@store')->name('admin.brand.store');
  Route::post('/update/{id}', 'BrandController@update')->name('admin.brand.update');
  Route::post('/delete/{id}', 'BrandController@delete')->name('admin.brand.delete');
});

route::group(['prefix'=>'division'], function(){
  Route::get('/create', 'DivisionController@create')->name('admin.division.create');
  Route::get('/edit/{id}', 'DivisionController@edit')->name('admin.division.edit');
  Route::post('/store', 'DivisionController@store')->name('admin.division.store');
  Route::post('/update/{id}', 'DivisionController@update')->name('admin.division.update');
  Route::post('/delete/{id}', 'DivisionController@delete')->name('admin.division.delete');
});

route::group(['prefix'=>'district'], function(){
  Route::get('/create', 'DistrictController@create')->name('admin.district.create');
  Route::get('/edit/{id}', 'DistrictController@edit')->name('admin.district.edit');
  Route::post('/store', 'DistrictController@store')->name('admin.district.store');
  Route::post('/update/{id}', 'DistrictController@update')->name('admin.district.update');
  Route::post('/delete/{id}', 'DistrictController@delete')->name('admin.district.delete');
});

route::group(['prefix'=>'slider'], function(){
  Route::get('/', 'SliderController@index')->name('admin.sliders');
  Route::post('/store', 'SliderController@store')->name('admin.slider.store');
  Route::post('/update/{id}', 'SliderController@update')->name('admin.slider.update');
  Route::post('/delete/{id}', 'SliderController@delete')->name('admin.slider.delete');
});

});
