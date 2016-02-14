<?php

//customer


Route::group(['prefix' => '/','middleware'=>['web'] ],function(){
    Route::auth();
    Route::group(['namespace' => 'Catalog'] ,function(){
      Route::get('/', 'IndexController@index');
      Route::resource('product','ProductController');
      Route::post('product','ProductController@addToCart');
      Route::resource('brand','CategoryController');
      Route::resource('search','SearchController');
      Route::match(['get','post'],'contactus','ContactController@contactus');
      Route::match(['get','post'],'confirm-payment','ContactController@confirmPayment');
      Route::get('/cart','CartController@index');

      Route::get('checkout','CheckoutController@index');
      Route::get('checkout/calculate','CheckoutController@calculate');


    });
});

Route::get('test',function(){
  return view('test.index');
});
Route::post('test',function(){

  return 1 ;
});

// Admin
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {

  Route::get('login','Authenticate@index');
  Route::resource('product', 'ProductController');
  Route::post('product/{product}','ProductController@ajax');
  Route::post('product/destroy', 'ProductController@destroy' );
  Route::resource('category', 'CategoryController');
  Route::resource('/','DashBoardController');

});
