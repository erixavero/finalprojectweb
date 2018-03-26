<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//Route::get("/{id}","userController@show");

Route::group([

    'prefix' => 'auth'

], function () {
    Route::get('show', 'AuthController@show');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register','Auth\RegisterController@create');

});

Route::group([
  'prefix'=>'item'
],function(){
    //items
    Route::get("/get","itemController@index");
    Route::get("/get/{id}","itemController@show");
    Route::post("/add","itemController@store");
    Route::post("/change/{id}","itemController@update");
    Route::delete("/del/{id}","itemController@destroy");
    Route::get("/search/{q}","itemController@search");

    Route::get("/itembycat/{id}","itemController@itemByCat");
});

Route::group([
  'prefix'=>'cat'
],function(){
    //categories
    Route::get("/get","catController@index");
    Route::get("/get/{id}","catController@show");
    Route::post("/add","catController@store");
    Route::post("/changecat","catController@update");
    Route::get("/delcat/{id}","catController@destroy");
});

//transaction
Route::get("/getalltrans","transController@index");
Route::get("/gettrans/{id}","transController@show");
Route::post("/addtrans","transController@store");
Route::post("/changetrans","transController@update");
Route::get("/deltrans/{id}","transController@destroy");

Route::get("/bill/{cust_id}/{item_id}","transController@subtotal");
Route::get("/bill/{cust_id}","transController@printBill");
