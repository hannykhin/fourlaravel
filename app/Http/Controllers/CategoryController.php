<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;

class CategoryController extends Controller
{
    public function getCategory(){
        
        $cats=Cat::get();
        return view ('category')->with (['cats'=>$cats]);

         
        }



       

        public function UpdateCategory(Request $request){
            $id =$request['id'];
            
            $cat =Cat::where('id',$id)->firstOrFail();
           
            $cat->category_name=$request['category_name'];
            
            $cat->update();
            return redirect ()->back()->with('success','The category has been updated');
            }


       




        public function getDeleteCategory($id){

             $catdel=Cat::where('id',$id)->firstOrFail();
             $catdel->delete();
            return redirect ()->back()->with('success','The category has been deleted');




        }


        public function postNewCat(Request $request){
           
            $this->validate($request,[
                'category_name'=>'required|unique:cats'
            
            ]);
            $cat=new Cat();
            $cat->category_name=$request['category_name'];

            $cat->save();
            return redirect()->back()->with("success","The post has been saved");


}





}