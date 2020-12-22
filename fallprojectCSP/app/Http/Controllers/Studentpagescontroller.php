<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\notice;
use App\AllUser;
use App\course;
use App\assignteacher;
use App\courseregistration;

class Studentpagescontroller extends Controller
{
    function index(){
        $active = courseregistration::where('status','approved')->where('student_id',session('id'))->get();
        $pending = courseregistration::where('status','pending')->where('student_id',session('id'))->get();
        $mycourse = courseregistration::join('all_users','all_users.id','=','courseregistrations.student_id')
                                ->join('courses','courses.id','=','courseregistrations.course_id')->where('courseregistrations.student_id',session('id'))
                                ->where('status','approved')->get();

        return view('student.pages.dashboard',compact('active','pending','mycourse'));
    }

    function profile(){
        
        $profile = AllUser::where('id',session('id'))->get();
        return view('student.pages.profile',compact('profile'));
    }
    function requestforcourse(){
        $reg = courseregistration::join('all_users','all_users.id','=','courseregistrations.teacher_id')
        ->join('courses','courses.id','=','courseregistrations.course_id')->where('courseregistrations.student_id',session('id'))->get();
        $course=course::get();
        return view('student.pages.requestforcourse',compact('course','reg'));
    }
    function seeblog(){
        $blog= blog::join('all_users','blogs.teacher_id','=','all_users.id')->select('blogs.id as bid','blogs.*','all_users.*')->get();
        return view('student.pages.seeblog',compact('blog'));
    }
    function notice(){
        $course=courseregistration::join('courses','courses.id','=','courseregistrations.course_id')
        ->where('courseregistrations.student_id',session('id'))->where('courseregistrations.status','approved')->get();
        $a = $course[0]->course_name;
        $a .=$course[0]->section;
        $notice = notice::join('all_users','all_users.id','=','notices.teacher_id')
        ->where('notices.course',$a)->select('notices.created_at as time','notices.*','all_users.*')
        ->orderBy('notices.id','desc')->get();
        return view('student.pages.notice',compact('course','notice'));
    }
    function findsection(Request $req){

        $data = assignteacher::join('all_users','assignteachers.teacher_id','=','all_users.id')->distinct('name')
        ->where('assignteachers.course_id',$req->id)->get();

        return response()->json($data);
    }

    function findteacher(Request $req){

        $data = assignteacher::join('all_users','assignteachers.teacher_id','=','all_users.id')
        ->where('assignteachers.course_id',$req->cid)->where('assignteachers.section',$req->section)->get();
        return response()->json($data);
    }

    function findnotice(Request $req){
        $data = notice::join('all_users','all_users.id','=','notices.teacher_id')
        ->where('notices.course',$req->course)->select('notices.created_at as time','notices.*','all_users.*')
        ->orderBy('notices.id','desc')->get();
        //$data = notice::where('course',$req->course)->get();

      // return view('student.pages.notice');
        return response()->json($data);
    }

    function viewblog($id){
        

        $blog=blog::join('all_users','all_users.id','=','blogs.teacher_id')
        ->where('blogs.id',$id)->select('blogs.created_at as time','blogs.*','all_users.*')->get();

        return view('student.pages.viewblog',compact('blog'));

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
        return redirect()->route('student.profile');
    }


}
