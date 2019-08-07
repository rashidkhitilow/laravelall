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
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('articles','ArticleController@index');//list all article
Route::get('article/{id}','ArticleController@show');//list single article
Route::post('article','ArticleController@store');//create
Route::put('articles','ArticleController@store');//update
Route::delete('articles','ArticleController@destroy');//update