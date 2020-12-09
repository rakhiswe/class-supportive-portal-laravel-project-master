<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\course;
use Image;
use File;


class CourseController extends Controller
{
    function createcourse(Request $request){

        $course = new course;
        $course->course_code=$request->coursecode;
        $course->course_name=$request->coursename;
        $course->course_department=$request->department;
        $course->course_credit=$request->coursecredit;
        $course->course_fee=$request->coursefee;

        
            //insertimage
            $photo=$request->file('photo');
            $img=time().'.'.$photo->getClientOriginalExtension();
            $location=public_path('images/'.$img);
            Image::make($photo)->save($location);
    
        
            $course->course_cover=$img;
            $course->save();

            session()->flash('success','A New Course Added Successfully');

            return redirect()->route('admin.courses');

    }

    function courses(){

        $allcourse = course::orderBy('id','desc')->get();

        return view('admin.pages.courses',compact('allcourse'));

    }

    function DeleteCourse($course_id){
        $course = course::where('id',$course_id);
        $course->delete();
        return redirect()->route('admin.courses');

    }

    function EditCourse($id){
        $course = course::where('id',$id)->get();
       // $teacher->update();
        return view('admin.pages.editcourse',compact('course'));

    }

    function UpdateCourse(Request $request,$id){
        $course = course::find($id);
        $course->course_code=$request->coursecode;
        $course->course_name=$request->coursename;
        $course->course_department=$request->department;
        $course->course_credit=$request->coursecredit;
        $course->course_fee=$request->coursefee;

        
            //insertimage
           /* $photo=$request->file('photo');
            $img=time().'.'.$photo->getClientOriginalExtension();
            $location=public_path('images/'.$img);
            Image::make($photo)->save($location);
    
        
            $course->course_cover=$img; */
            $course->save();

        return redirect()->route('admin.courses');

    }



}
