<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\assignteacher;
use App\course;
use App\notice;
use App\AllUser;
use App\courseregistration;

class Teacherpagescontroller extends Controller
{
    function index(){
        $tb = blog::where('teacher_id',session('id'))->get();
        $tpr = courseregistration::where('teacher_id',session('id'))->where('status','pending')->get();
        $tn =notice::where('teacher_id',session('id'))->get();

        return view('teacher.pages.dashboard',compact('tb','tpr','tn'));
    }

    function profile(){
        $profile=AllUser::where('id',session('id'))->get();
        return view('teacher.pages.profile',compact('profile'));
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
        return redirect()->route('teacher.profile');
    }

    function request(){

        $data = courseregistration::join('all_users','all_users.id','=','courseregistrations.student_id')
        ->join('courses','courses.id','=','courseregistrations.course_id')->where('courseregistrations.teacher_id',session('id'))
        ->where('status','pending')
        ->select('courseregistrations.id as xid','courseregistrations.*','all_users.*','courses.*')
        ->get();
        return view('teacher.pages.request',compact('data'));
    }
    function blog(){
        $blog = Blog::orderBy('id','asc')->where('teacher_id',session('id'))->get();
        return view('teacher.pages.blog',compact('blog'));
    }
    function createblog(){
        return view('teacher.pages.createblog');
    }

    function notice(){
        $notice = notice::orderBy('id','asc')->where('teacher_id',session('id'))->get();
        return view('teacher.pages.notice',compact('notice'));
    }

    function createnotice(){
        $mycourse = course::join('assignteachers','courses.id','=','assignteachers.course_id')->where('assignteachers.teacher_id',session('id'))->get();
      // print_r($mycourse);
        return view('teacher.pages.createnotice',compact('mycourse'));
    }
    function studentapprove($id){

        $data = courseregistration::find($id);
        $data->status = 'approved';
        $data->save();
        session()->flash('success','Student Approved');
        return redirect()->route('teacher.request');

    }
    function studentreject($id){
        $data = courseregistration::find($id);
        $data->status = 'rejected';
        $data->save();
        session()->flash('success','Student Rejected');
        return redirect()->route('teacher.request');

    }
}
/*
$users = User::join('posts', 'users.id', '=', 'posts.user_id')
                ->get(['users.*', 'posts.descrption']);
DB::table('users')
->select('users.id','users.name','profiles.photo')
->join('profiles','profiles.id','=','users.id')
->where(['something' => 'something', 'otherThing' => 'otherThing'])
->get();
*/
