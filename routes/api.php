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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// barang route

Route::get('barang', 'BarangController@index');

Route::get('/barang/{id}', 'BarangController@getId');

Route::post('/barang', 'BarangController@create');

Route::put('/barang/update/{id}', 'BarangController@update');

Route::delete('/barang/{id}', 'BarangController@delete');


// history route

Route::get('history', 'HistoryController@index');

Route::get('/history/{id}', 'HistoryController@getId');

Route::post('/history', 'HistoryController@create');

Route::put('/history/update/{id}', 'HistoryController@update');

Route::delete('/history/{id}', 'HistoryController@delete');

// user/operator route


Route::get('operator', 'OperatorController@index');

Route::get('/operator/{id}', 'OperatorController@getId');

Route::post('/operator', 'OperatorController@create');

Route::put('/operator/update/{id}', 'OperatorController@update');

Route::delete('/operator/{id}', 'OperatorController@delete');
