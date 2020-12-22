<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notice;

class NoticeController extends Controller
{
    function createnotice(Request $request){

        $notice = new notice;
      
        
        $notice->title=$request->title;
        $notice->details=$request->details;
        $notice->teacher_id=session('id');
        $notice->teacher_name=session('name');
        $notice->course=$request->coursename;

           
    
        $notice->save();

        session()->flash('success','A New Notice Added Successfully');

        return redirect()->route('teacher.notice');
        

    }

    function DeleteNotice($id){
        $notice = notice::where('id',$id);
        $notice->delete();
        return redirect()->route('teacher.notice');

    }

    function EditBlog($id){
        $notice = notice::where('id',$id)->get();
       // $notice->update();
        return view('teacher.pages.editnotice',compact('notice'));

    }
    function UpdateBlog(Request $request,$id){
        $notice = notice::find($id);
        $notice->title=$request->title;
        $notice->details=$request->details;
        $notice->teacher_id=session('id');
        $notice->teacher_name=session('name');
        $notice->course=$request->coursename;

           
    
        $notice->save();

        session()->flash('success','A New Notice Updated Successfully');

        return redirect()->route('teacher.notice');
        

    }


}
