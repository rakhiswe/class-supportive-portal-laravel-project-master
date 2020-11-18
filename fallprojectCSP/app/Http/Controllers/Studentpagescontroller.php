<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Studentpagescontroller extends Controller
{
    function index(){
        return view('student.pages.dashboard');
    }

    function profile(){
        return view('student.pages.profile');
    }
    function requestforcourse(){
        return view('student.pages.requestforcourse');
    }
    function seeblog(){
        return view('student.pages.seeblog');
    }
    function notice(){
        return view('student.pages.notice');
    }




}
