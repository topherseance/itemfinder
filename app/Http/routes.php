<?php

Route::get('/'     , [ 'as' => 'public.index' , 'uses' => 'PublicController@index' ]);
Route::get('/find' , [ 'as' => 'public.find'  , 'uses' => 'PublicController@find' ]);

Route::get ('/step-1' , function() {
	return view('step1');
});
Route::get ('/step-2' , function() {
	return view('step2');
});
Route::get ('/step-3' , function() {
	return view('step3');
});
Route::get ('/step-4' , function() {
	return view('step4');
});
Route::get ('/vendor'  , function() {
	return view('vendor');
});

Route::get ('/register' , [ 'as' => 'public.getRegister'  , 'uses' => 'Auth\AuthController@getRegister' ]);
Route::post('/register' , [ 'as' => 'public.postRegister' , 'uses' => 'Auth\AuthController@postRegister' ]);

Route::get ('/admin' , [ 'as' => 'admin.getLogin'  , 'uses' => 'Auth\AuthController@getLogin' ]);
Route::post('/admin' , [ 'as' => 'admin.postLogin' , 'uses' => 'Auth\AuthController@postLogin' ]);

Route::group([ 'prefix' => 'admin', 'middleware' => 'auth' ], function() {
	
	Route::post('/logout' , [ 'as' => 'admin.getLogout' , 'uses' => 'Auth/AuthController@getLogout' ]);
	
	Route::get('/dashboard'     , [ 'as' => 'admin.dashboard' , 'uses' => 'DashboardController@index' ]);
	
	Route::get ('/shops/'            , [ 'as' => 'admin.shops.index'      , 'uses' => 'ShopsController@index' ]);
	Route::get ('/shops/new'         , [ 'as' => 'admin.shops.getCreate'  , 'uses' => 'ShopsController@getCreate' ]);
	Route::get ('/shops/{id}/view'   , [ 'as' => 'admin.shops.view'       , 'uses' => 'ShopsController@view' ]);
	Route::get ('/shops/{id}/edit'   , [ 'as' => 'admin.shops.getEdit'    , 'uses' => 'ShopsController@getEdit' ]);
	Route::get ('/shops/{id}/delete' , [ 'as' => 'admin.shops.getDelete'  , 'uses' => 'ShopsController@getDelete' ]);
	Route::post('/shops/new'         , [ 'as' => 'admin.shops.postCreate' , 'uses' => 'ShopsController@postCreate' ]);
	Route::post('/shops/{id}/edit'   , [ 'as' => 'admin.shops.postEdit'   , 'uses' => 'ShopsController@postEdit' ]);
	Route::post('/shops/{id}/delete' , [ 'as' => 'admin.shops.postDelete' , 'uses' => 'ShopsController@postDelete' ]);
	
	Route::get ('/items/{shopId}'     , [ 'as' => 'admin.items.index'      , 'uses' => 'ItemsController@index' ]);
	Route::get ('/items/{shopId}/new' , [ 'as' => 'admin.items.getCreate'  , 'uses' => 'ItemsController@getCreate' ]);
	Route::get ('/items/{id}/view'    , [ 'as' => 'admin.items.view'       , 'uses' => 'ItemsController@view' ]);
	Route::get ('/items/{id}/edit'    , [ 'as' => 'admin.items.getEdit'    , 'uses' => 'ItemsController@getEdit' ]);
	Route::get ('/items/{id}/delete'  , [ 'as' => 'admin.items.getDelete'  , 'uses' => 'ItemsController@getDelete' ]);
	Route::post('/items/{shopId}/new' , [ 'as' => 'admin.items.postCreate' , 'uses' => 'ItemsController@postCreate' ]);
	Route::post('/items/{id}/edit'    , [ 'as' => 'admin.items.postEdit'   , 'uses' => 'ItemsController@postEdit' ]);
	Route::post('/items/{id}/delete'  , [ 'as' => 'admin.items.postDelete' , 'uses' => 'ItemsController@postDelete' ]);
	
	
	
});


