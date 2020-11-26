<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AllUser;
use Image;
use File;

class TeacherController extends Controller
{
    function CreateTeacher(Request $request){

        $user = new AllUser;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        //$user->photo='1234';
        $user->number=$request->number;
        $user->official_id=$request->teacherid;

        if (count($request->photo>0)) {
            //insertimage
            $photo=$request->file('photo');
            $img=time().'.'.$photo->getClientOriginalExtension();
            $location=public_path('images/'.$img);
            Image::make($photo)->save($location);
    
        
            $user->photo=$img;
        }



        $user->type='teacher';
        $user->save();

        return redirect()->route('admin.teachers');
        

    }
    
}
