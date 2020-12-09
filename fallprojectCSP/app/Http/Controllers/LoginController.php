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
   
    if(count($user)>0){

        if($user[0]->type == 'admin'){

            $request->session()->put('uid',$user[0]->id);
            $request->session()->put('name',$user[0]->name);
            $request->session()->put('photo',$user[0]->photo);
            $request->session()->put('type',$user[0]->type);
            return redirect('admin');
    
           }
           else if($user[0]->type == 'teacher'){
            
            $request->session()->put('type',$user[0]->type);
            return redirect('teacher');
    
           }
           else if($user[0]->type == 'student'){
    
            return redirect('student');
    
           }
          


    }else{

        $request->session()->flash('msg','inavlid username/password');
       return redirect('login');
    }
        



    }
}
