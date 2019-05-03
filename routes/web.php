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
    return view('welcome');
});

Route::get('/updateRef',function(){
    return view('updateRef');
});

Route::get('/topselling',function(){
	return view('topselling');
});



Route::post('/update_reference','goController@updateRef');


Route::post('/product','goController@get_query');

//Route::get('/update','goController@upadteStock');


Route::get('/xiaomi','goController@xiaomi');

Route::get('/stocks',function(){
	return view('stock');
});

Route::get('/stockinfo','stockController@check');