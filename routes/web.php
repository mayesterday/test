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

Auth::routes();
Route::get('/home', 'HomeController@index');




Route::post('registerCus', 'registerCustomerController@store');



Route::get('/', function () {
    // return view('welcome');
    return view('index');
});



// Route::get('/{vue_capture?}', function () {
//     return view('index');
// })->where('vue_capture', '[\/\w\.-]*');

Route::group(['prefix'=>'api','middleware'=>['api','auth']], function () {
    Route::resource('customer', 'frontEnd\customers\customerController',[ 'except' => ['create'] ]);



});
