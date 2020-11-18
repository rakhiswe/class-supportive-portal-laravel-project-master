<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Teacherpagescontroller extends Controller
{
    function index(){
        return view('teacher.pages.dashboard');
    }

    function profile(){
        return view('teacher.pages.profile');
    }

    function request(){
        return view('teacher.pages.request');
    }
    function blog(){
        return view('teacher.pages.blog');
    }
    function notice(){
        return view('teacher.pages.notice');
    }
}
