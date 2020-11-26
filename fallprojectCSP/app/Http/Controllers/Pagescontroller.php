<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AllUser;

class Pagescontroller extends Controller
{
    function index(){
        return view('index');
    }
    function dashboard(){
        return view('admin.pages.dashboard');
    }
    function login(){
        return view('login');
    }
    function createstudent(){
        return view('admin.pages.createstudent');
    }
    function students(){
        return view('admin.pages.students');

    }
    function teachers(){
        return view('admin.pages.teachers');

    }

    function createteacher(){
        return view('admin.pages.createteacher');
    }

    function courses(){
        return view('admin.pages.courses');

    }

    function createcourse(){
        return view('admin.pages.createcourse');
    }

    function profile(){
        return view('admin.pages.profile');
    }
 


}
