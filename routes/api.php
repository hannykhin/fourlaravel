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


Route::post('/login',[
    'uses'=>'apiController@postLogin'


]);





    Route::get('/categories',[
        'uses'=>'apiController@getCategories'
    
    
    ]);
    
    Route::post('/category',[
        'uses'=>'apiController@postNewCategory'
    
    
    ]);
    
    Route::get('/posts',[
        'uses'=>'apiController@getPosts'
    
    
    ]);

    Route::get('/category/{id}/post',[
        'uses'=>'apiController@getPostbyCat'
    ]);

    Route::get('/post/{id}/one',[
        'uses'=>'apiController@getPostOne',
    ]);
