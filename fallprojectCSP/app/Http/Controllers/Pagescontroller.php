<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AllUser;
use App\course;
use App\assignteacher;
use View;
use App\Blog;


class Pagescontroller extends Controller
{
    function index(){

        $allcourse = course::orderBy('id','desc')->get();
        $course = course::orderBy('id','desc')->take(4)->get();
        $totalstudent = AllUser::orderBy('id','desc')->where('type','student')->get();
        $totalteacher = AllUser::orderBy('id','desc')->where('type','teacher')->get();
        $blog = Blog::take(4)->get();

        return view('index',compact('allcourse','totalstudent','totalteacher','course','blog'));
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
        $profile = AllUser::where('id',session('uid'))->get();
        return view('admin.pages.profile', compact('profile'));
    }
 
    function assignteacher(){
        $course = assignteacher::join('courses','courses.id','=','assignteachers.course_id')
        ->join('all_users','all_users.id','=','assignteachers.teacher_id')
        ->select('assignteachers.id as aid','assignteachers.*','courses.*','all_users.*')->get();
        //$id->course_id;
       // $course=course::where('id',$id[0]->course_id)->get();

        return view('admin.pages.assignteacherlist',compact('course'));
    }
    function profileupdate(Request $request){
        
        $user = AllUser::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->number=$request->number;
        $user->official_id=$request->teacherid;
        $user->save();

        session()->flash('rakhi','profile updated');
        return redirect()->route('admin.profile');
    }


}
