<?php

//customer


Route::group(['prefix' => '/','middleware'=>'web' ],function(){



    Route::group(['namespace' => 'Catalog'] ,function(){
      Route::group(['namespace' => 'Auth'] ,function(){
        Route::get('login','AuthController@showLoginForm');
        Route::post('login','AuthController@postLogin');
        Route::get('logout','AuthController@logout');

        Route::get('register','AuthController@getRegister');
        Route::post('register','AuthController@postRegister');
      });
      Route::get('/', 'IndexController@index');
      Route::resource('product','ProductController');
      Route::post('product','ProductController@addToCart');
      Route::resource('brand','CategoryController');
      Route::resource('search','SearchController');
      Route::get('contactus','ContactController@getContactus');
      Route::get('confirm-payment','ContactController@getConfirmPayment');
      Route::post('confirm-payment','ContactController@postConfirmPayment');
      Route::get('cart','CartController@index');

      Route::get('profile/{id}','Usercontroller@show');
      Route::post('profile/{id}','Usercontroller@update');

      Route::get('checkout','CheckoutController@index');
      Route::get('checkout/calculate','CheckoutController@calculate');
      Route::get('checkout/calculate/success',function(){
        return view('catalog.checkout.success');
      });

    });
});

Route::get('test',function(){
  $pros = App\Product::all();
  $intersect = $pros;
  return dd($intersect);
});
Route::post('test',function(){


});

// Admin
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {




  Route::group( ['middleware'=> 'web' ],function(){
    Route::group(['namespace' => 'Auth'] ,function(){
      Route::get('login','AuthController@getLogin');
      Route::post('login','AuthController@postLogin');

      Route::get('logout','AuthController@getLogout');
    });
    Route::resource('product', 'ProductController');
    Route::post('product/{product}/ajax/destroy','ProductController@ajaxDestroy');
    Route::post('product/destroy', 'ProductController@destroy' );
    Route::resource('category', 'CategoryController');
    Route::get('category/{id}/destroy', 'CategoryController@destroy');
    Route::resource('/','DashBoardController');

    Route::get('/test',function(){
      //Auth::guard('admin')->attempt(array('user_id'=>'Nosh','password'=>123123))  ;
      //Auth::guard('admin')->logout();
      return Auth::guard('admin')->user();

    });

    Route::get('invoice','InvoiceController@index');
    Route::get('cart','CartController@index');

    Route::get('checkpayment','CheckPayment@index');
    Route::post('checkpayment','CheckPayment@post');
  });


});
