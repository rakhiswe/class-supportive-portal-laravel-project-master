<?php

namespace App\Http\Controllers;
use App\Blog;

use Illuminate\Http\Request;
use Image;
use File;

class BlogController extends Controller
{
    function createblog(Request $request){

        $blog = new Blog;
        $blog->title=$request->title;
        $blog->details=$request->details;
        $blog->teacher_id=session('id');

            //insertimage
            $photo=$request->file('photo');
            $img=time().'.'.$photo->getClientOriginalExtension();
            $location=public_path('images/'.$img);
            Image::make($photo)->save($location);
    
        
            $blog->bphoto=$img;
    
        $blog->save();

        session()->flash('success','A New Blog Added Successfully');

        return redirect()->route('teacher.blog');
        
    }

    function DeleteBlog($id){
        $blog = Blog::where('id',$id);
        $blog->delete();
        return redirect()->route('teacher.blog');

    }

    function EditBlog($id){
        $blog = Blog::where('id',$id)->get();
       // $blog->update();
        return view('teacher.pages.editblog',compact('blog'));

    }
    function UpdateBlog(Request $request,$id){
        $blog = Blog::find($id);
        $blog->title=$request->title;
        $blog->details=$request->details;
        $blog->teacher_id=session('id');

     
       

        
            //insertimage
           // $photo=$request->file('photo');
//$img=time().'.'.$photo->getClientOriginalExtension();
           // $location=public_path('images/'.$img);
           // Image::make($photo)->save($location);
    
        
           // $blog->photo=$img;
        


        //$blog->number=$request->number;
        //$blog->official_id=$request->teacherid;
        //$blog->type='blog';
        $blog->save();

   

        session()->flash('success','A New Blog Updated Successfully');

        return redirect()->route('teacher.blog');

    }



}
