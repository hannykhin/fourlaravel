<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/',[

    'uses'=>'WelcomeController@getWelcome',
    'as'=>'/'
    ]);

    Route::get('/front/images/{file_name}',[

        'uses'=>'PostController@getImage',
        'as'=>'front.images'
        ]);

        Route::get('/front/read/{id}',[

            'uses'=>'WelcomeController@getReadMore',
            'as'=>'read.more'
            ]);

            Route::get('/filter-by-category/{id}',[

                'uses'=>'WelcomeController@getByCategory',
                'as'=>'filter.by.category'
                ]);

                Route::get('/search-posts',[

                    'uses'=>'WelcomeController@getSearch',
                    'as'=>'search.posts'
                    ]);
            
        
    
    



       


Route::group(['middleware'=>'auth'],function(){

    Route::get('/category',[
    'uses'=>'CategoryController@getCategory',
    'as'=>'category'
    
    ]);


    Route::get('/category/delete/{id}',[

        'uses'=>'CategoryController@getDeleteCategory',
        'as'=>'delete.category'
        ]);


        
        Route::put('/post/update',[

            'uses'=>'PostController@UpdatePost',
            'as'=>'post.update'
            ]);





    Route::get('/post/delete/{id}',[

        'uses'=>'PostController@DeletePost',
        'as'=>'delete.post'
        ]);

    Route::get('/category/{id}/edit',[
        'uses'=>'PostController@getEditPost',
        'as'=>'edit.post'
        ]);
    




Route::post('/category/update',[

    'uses'=>'CategoryController@UpdateCategory',
    'as'=>'update.category'
    ]);

    Route::get('/images/{file_name}',[

        'uses'=>'PostController@getImage',
        'as'=>'post.images'
        ]);



Route::post ('/category/new',[

'uses'=>'CategoryController@postNewCat',
'as'=>'cat.new'
]);


Route::get ('/posts',[

'uses'=>'PostController@getNewPost',
'as'=>'posts'
]);

Route::get ('/posts/new',[

    'uses'=>'PostController@getNewPost2',
    'as'=>'posts.new'
    ]);


    Route::post ('/posts/new',[

        'uses'=>'PostController@postNewPost',
        'as'=>'post.new'
        ]);


    });

Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');
