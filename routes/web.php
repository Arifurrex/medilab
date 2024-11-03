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



Route::get('/','Frontend\pagescontroller@index')->name('index');

Route::get('/pagescontroller','Frontend\pagescontroller@index')->name('index');
Route::get('/contact','Frontend\pagescontroller@contact')->name('contact');


/*
Products Routes
All the routes for our product for frontend
*/
Route::group(['prefix' => 'products'], function(){

Route::get('/', 'Frontend\ProductController@index')->name('products');
Route::get('/{slug}', 'Frontend\ProductController@show')->name('products.show');
Route::get('/new/search', 'Frontend\pagescontroller@search')->name('search');

// catagory route
Route::get('/catagories', 'Frontend\CatagoriesController@index')->name('catagories.index');
Route::get('/catagory/{id}', 'Frontend\CatagoriesController@show')->name('catagories.show');

});



// User route
Route::group(['prefix' => 'user'], function(){
Route::get('/token/{token}', 'Frontend\verificationController@verify')->name('user.varification');
Route::get('/dashboard', 'Frontend\usersController@dashboard')->name('user.dashboard');
Route::get('/profile', 'Frontend\usersController@profile')->name('user.profile');
Route::post('/profile/update', 'Frontend\usersController@profileUpdate')->name('user.profile.update');

});

    //  cart Route

  Route::group(['prefix' => 'carts'], function(){

  Route::get('/', 'Frontend\cartsController@index')->name('carts');
  Route::post('/store', 'Frontend\cartsController@store')->name('carts.store');
  Route::post('/update/{id}', 'Frontend\cartsController@update')->name('carts.update');
  Route::post('/delete/{id}', 'Frontend\cartsController@destroy')->name('carts.delete');

  });

    //  checkout Route

  Route::group(['prefix' => 'checkout'], function(){

  Route::get('/', 'Frontend\checkoutController@index')->name('checkout');
  Route::post('/store', 'Frontend\checkoutController@store')->name('checkouts.store');


  });


/*
Products Routes
All the routes for our product for backend
*/
//Admin Route
Route::group(['prefix' => 'admin'], function(){
  Route::get('/', 'Backend\PagesController@index')->name('admin.index');

  // admin login route
  Route::get('/login', 'Auth\admin\LoginController@showLoginForm')->name('admin.login');
  // admin.login.submit
  Route::post('/login/submit', 'Auth\admin\LoginController@login')->name('admin.login.submit');
  Route::post('/logout/submit', 'Auth\admin\LoginController@logout')->name('admin.logout');


//  product Route

  Route::group(['prefix' => '/products'], function(){

  Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
  Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
  Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');
  Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');
  Route::post('/edit/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
  Route::post('/delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');

  });
//  Catagory Route

  Route::group(['prefix' => '/catagories'], function(){

  Route::get('/', 'Backend\CatagoriesController@index')->name('admin.catagories');
  Route::get('/create', 'Backend\CatagoriesController@create')->name('admin.catagory.create');
  Route::get('/edit/{id}', 'Backend\CatagoriesController@edit')->name('admin.catagory.edit');
  Route::post('/store', 'Backend\CatagoriesController@store')->name('admin.catagory.store');
  Route::post('/catagory/edit/{id}', 'Backend\CatagoriesController@update')->name('admin.catagory.update');
  Route::post('/catagory/delete/{id}', 'Backend\CatagoriesController@delete')->name('admin.catagory.delete');

  });

  //  order Route

  Route::group(['prefix' => '/orders'], function(){

  Route::get('/', 'Backend\ordersController@index')->name('admin.orders');
  Route::get('/show/{id}', 'Backend\ordersController@showw')->name('admin.order.show');
  Route::post('/delete/{id}', 'Backend\ordersController@delete')->name('admin.order.delete');
  Route::post('/completed/{id}', 'Backend\ordersController@completed')->name('admin.order.completed');
  Route::post('/paid/{id}', 'Backend\ordersController@paid')->name('admin.order.paid');

  });

//  Brand Route

  Route::group(['prefix' => '/brands'], function(){

  Route::get('/', 'Backend\BrandsController@index')->name('admin.brands');
  Route::get('/create', 'Backend\BrandsController@create')->name('admin.brand.create');
  Route::get('/edit/{id}', 'Backend\BrandsController@edit')->name('admin.brand.edit');
  Route::post('/store', 'Backend\BrandsController@store')->name('admin.brand.store');
  Route::post('/brand/edit/{id}', 'Backend\BrandsController@update')->name('admin.brand.update');
  Route::post('/brand/delete/{id}', 'Backend\BrandsController@delete')->name('admin.brand.delete');

  });

  //  Division Route

  Route::group(['prefix' => '/Divisions'], function(){

  Route::get('/', 'Backend\DivisionsController@index')->name('admin.divisions');
  Route::get('/create', 'Backend\DivisionsController@create')->name('admin.division.create');
  Route::get('/edit/{id}', 'Backend\DivisionsController@edit')->name('admin.division.edit');
  Route::post('/store', 'Backend\DivisionsController@store')->name('admin.division.store');
  Route::post('/division/edit/{id}', 'Backend\DivisionsController@update')->name('admin.division.update');
  Route::post('/division/delete/{id}', 'Backend\DivisionsController@delete')->name('admin.division.delete');

  });

    //  District Route

  Route::group(['prefix' => '/Districts'], function(){

  Route::get('/', 'Backend\DistrictsController@index')->name('admin.districts');
  Route::get('/create', 'Backend\DistrictsController@create')->name('admin.district.create');
  Route::get('/edit/{id}', 'Backend\DistrictsController@edit')->name('admin.district.edit');
  Route::post('/store', 'Backend\DistrictsController@store')->name('admin.district.store');
  Route::post('/district/edit/{id}', 'Backend\DistrictsController@update')->name('admin.district.update');
  Route::post('/district/delete/{id}', 'Backend\DistrictsController@delete')->name('admin.district.delete');

  });

});





// slider route start here
Route::get('/add-slider','SilderController@addSlider')->name('addSlide');
Route::post('/upload-slide','SilderController@uploadSlide')->name('upload-slide');
Route::get('/manage-slide','SilderController@manageSlide')->name('manage-slide');
Route::get('/slide-edit/{id}','SilderController@slideEdit')->name('slide-edit');
Route::post('/update-slide/{id}','SilderController@updateSlide')->name('update-slide');
Route::get('/slide-delete/{id}','SilderController@slideDelete')->name('slide-delete');

// published unpublished slide
Route::get('/slide-unpublished/{id}','SilderController@slideUnpublished')->name('slide-unpublished');
Route::get('/slide-published/{id}','SilderController@slidePublished')->name('slide-published');


//  slider route end here

Auth::routes();

Route::get('/home','HomeController@index')->name('home');


