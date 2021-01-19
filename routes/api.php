<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/product/create', 'ProductsController@store');
Route::get('/product/edit/{id}', 'ProductsController@edit');
Route::post('/product/update/{id}', 'ProductsController@update');
Route::delete('/product/delete/{id}', 'ProductsController@delete');
Route::get('/products', 'ProductsController@index');
Route::get('/allsuppliers', 'ProductsController@suppliers');

Route::post('/supplier/create', 'SuppliersController@store');
Route::get('/supplier/edit/{id}', 'SuppliersController@edit');
Route::post('/supplier/update/{id}', 'SuppliersController@update');
Route::delete('/supplier/delete/{id}', 'SuppliersController@delete');
Route::get('/suppliers', 'SuppliersController@index');
