<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AllUser;
use App\course;
use App\assignteacher;
use View;


class Pagescontroller extends Controller
{
    function index(){
        return view('index');
    }
    function dashboard(Request $request){

        $uid = $request->session()->get('uid');
        $totalstudent = AllUser::orderBy('id','desc')->where('type','student')->get();

        $name = AllUser::where('id',$uid)->get();
        
      //  $a = $totalstudent.length();
      $totalteacher = AllUser::orderBy('id','desc')->where('type','teacher')->get();
      $totalcourse = course::orderBy('id','desc')->get();


      //return View::make('admin.pages.dashboard',compact('totalstudent','totalteacher','totalcourse','name'))->nest('admin.layouts.master', compact('name'));



      // return view('admin.layouts.master',compact('name'));
return view('admin.pages.dashboard')->with(compact('totalstudent','totalteacher','totalcourse','name'));
     
    }
    function login(){
        return view('login');
    }
    function createstudent(){
        return view('admin.pages.createstudent');
    }
    function students(){
        $allstudent = AllUser::orderBy('id','desc')->where('type','student')->get();
        return view('admin.pages.students',compact('allstudent'));

    }
    function teachers(){

        $allteacher = AllUser::orderBy('id','desc')->where('type','teacher')->get();

        return view('admin.pages.teachers',compact('allteacher'));

    }
   

    function createteacher(){
        return view('admin.pages.createteacher');
    }

    function courses(){
        $allcourse = course::orderBy('id','desc')->get();
        return view('admin.pages.courses',compact('allcourse'));

    }

    function createcourse(){
        return view('admin.pages.createcourse');
    }

    function profile(){
        return view('admin.pages.profile');
    }
 
    function assignteacher(){
        $course = assignteacher::orderBy('id','desc')->get();
        //$id->course_id;
       // $course=course::where('id',$id[0]->course_id)->get();

        return view('admin.pages.assignteacherlist',compact('course'));
    }


}
