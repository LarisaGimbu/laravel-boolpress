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

Route::get('prova', function(){
    $user = [
        "name" => "Larisa",
        "lastname" => "Gimbu",
    ];

    return response()->json(compact('user'));
});

// Route::get('posts', 'Api\PostController@index');

Route::namespace('Api')
    ->group(function(){
        Route::get('/posts', 'PostController@index');
        Route::get('posts/{slug}', 'PostController@show');
        Route::get('posts/postcategory/{slug}', 'PostController@getPostsByCategory');
        Route::get('posts/posttag/{slug}', 'PostController@getPostByTag');
        Route::post('contacts/', 'ContactController@store');
    });