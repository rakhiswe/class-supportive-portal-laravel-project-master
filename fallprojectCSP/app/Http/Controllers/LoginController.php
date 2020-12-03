<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AllUser;

class LoginController extends Controller
{
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $user = AllUser::where('email',$email)->where('password',$password)->get();
        //echo $user[0]->name;
       // return redirect('login');
       if($user[0]->type == 'admin'){

        return redirect('admin');

       }
       else if($user[0]->type == 'teacher'){

        return redirect('teacher');

       }
       else if($user[0]->type == 'student'){

        return redirect('student');

       }else if($user[0]->type == ''){
       return redirect('login');
             
       }

    }
}
