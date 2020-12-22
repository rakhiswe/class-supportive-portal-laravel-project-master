<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courseregistration;

class CourseregistrationController extends Controller
{
    function store(Request $req){
        $reg = new courseregistration;
        $reg->teacher_id=$req->teacher_id;
        $reg->teacher_name=$req->teacher_name;
        $reg->course_id=$req->courseid;
        $reg->section=$req->section;
        $reg->status='pending';
        $reg->student_id=session('id');
        $reg->save();
        return redirect()->route('student.requestforcourse');
    }

   

    
}
