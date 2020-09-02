<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Cat;

class WelcomeController extends Controller
{
    public function getWelcome(){

        $posts=Post::OrderBy('id','desc')->paginate(2);
        $cats=Cat::get();


        return view('welcome')->with(['posts'=>$posts,'cats'=>$cats]);

    }

    public function getByCategory($id){

        $posts=Post::where('cat_id',$id)->OrderBy('id','desc')->paginate(2);
        $cats=Cat::get();


        return view('welcome')->with(['posts'=>$posts,'cats'=>$cats]);


    }


    public function getSearch(Request $request)
    {

        $post_title=$request['post_title'];


        $posts=Post::where('title',"LIKE","%$post_title%")
        ->orWhere('content',"LIKE","%$post_title%")
        
        
        ->OrderBy('id','desc')->paginate(2);
        $cats=Cat::get();


        return view('welcome')->with(['posts'=>$posts,'cats'=>$cats]);


    }




    public function getReadMore($id){

       

        $post =Post::where('id',$id)->firstOrFail();
    
    return view ('read-more')->with(['post'=>$post]);


   }





}
