<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cat;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function getNewPost(){

        $posts=Post::OrderBy('id','desc')->get();
        return view ('posts')->with(['posts'=>$posts]);
        }

        public function getImage($file_name){
            $file=Storage::disk('post')->get($file_name);
            return response($file);



        }

        public function getEditPost($id){

            $cats=Cat::get();

            $post=Post::where('id',$id)->firstOrFail();
        
        return view ('edit-post')->with(['post'=>$post,'cats'=>$cats]);


       }
       public function UpdatePost(Request $request){

        $id=$request ['id'];
        $post=Post::whereId($id)->firstOrFail();
        if($request->file('image')){

            Storage::disk("post")->delete($post->image);  //delete image


            $img=$request->file('image');
            $img_name=date("dmyhis").".".$img->getClientOriginalExtension();   //update file
            Storage::disk('post')->put($img_name, File::get($img));


            $post->image=$img_name;  //update database htaee ca name

        }
        $post->title=$request['title'];
        $post->video=$request['video'];
        $post->content=$request['content'];
        $post->cat_id=$request['cat_id'];
        $post->update();
        return redirect()->route('posts')->with('success',"the post has been updated");
        
       }



       public function DeletePost(Request $request){

        $id=$request ['id'];
        $post=Post::whereId($id)->firstOrFail();

        

        Storage::disk("post")->delete($post->image);  //delete imag

       
        $post->title=$request['title'];
        $post->video=$request['video'];
        $post->content=$request['content'];
        $post->cat_id=$request['cat_id'];
        $post->delete();

        return redirect()->route('posts')->with('success',"the post has been deleted");
        



       }




    




      
        


        public function getNewPost2(){

            $cats=Cat::get();

        
        
            return view ('new-post')->with(['cats'=>$cats]);
            }


            public function postNewPost(Request $request){
           
                $this->validate($request,[
                    'title'=>'required',
                    'image'=>'required|mimes:jpg,jpeg,png,gif',
                    'content'=>'required',
                    'video'=>'required',
                    'cat_id'=>'required'
                ]);
                $img=$request->file("image");
                $img_name=date("dmyhis").".".$img->getClientOriginalExtension();




                $p= new Post();
                $p->title=$request['title'];
                $p->image=$img_name;

                $p->video=$request['video'];
                $p->content=$request['content'];
                $p->cat_id=$request['cat_id'];
                $p->save();
                 


                Storage::Disk("post")->put($img_name,File::get($img));
                return redirect()->back()->with('success',"The post has been uploaded");


            
            }

            


}
