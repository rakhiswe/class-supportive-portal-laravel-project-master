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
     
       

        
            //insertimage
            $photo=$request->file('photo');
            $img=time().'.'.$photo->getClientOriginalExtension();
            $location=public_path('images/'.$img);
            Image::make($photo)->save($location);
    
        
            $user->photo=$img;
        


        $user->number=$request->number;
        $user->official_id=$request->teacherid;
        $user->type='teacher';
        $user->save();

        return redirect()->route('admin.teachers');
        

    }

    function DeleteTeacher($id){
        $teacher = AllUser::where('id',$id);
        $teacher->delete();
        return redirect()->route('admin.teachers');

    }

    function teachers(){

        $allteacher = AllUser::orderBy('id','desc')->where('type','teacher')->get();

        return view('admin.pages.teachers',compact('allteacher'));

    }

    function EditTeacher($id){
        $teacher = AllUser::where('id',$id)->get();
       // $teacher->update();
        return view('admin.pages.editteacher',compact('teacher'));

    }
    function UpdateTeacher(Request $request,$id){
        $teacher = AllUser::find($id);
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->password=$request->password;
     
       

        
            //insertimage
           // $photo=$request->file('photo');
//$img=time().'.'.$photo->getClientOriginalExtension();
           // $location=public_path('images/'.$img);
           // Image::make($photo)->save($location);
    
        
           // $teacher->photo=$img;
        


        $teacher->number=$request->number;
        $teacher->official_id=$request->teacherid;
        $teacher->type='teacher';
        $teacher->save();

        return redirect()->route('admin.teachers');

    }




// Student module
    function CreateStudent(Request $request){

        $user = new AllUser;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->photo='1234';
        $user->number=$request->number;
        $user->official_id=$request->studentid;
        
        //insertimage
        $photo=$request->file('photo');
        $img=time().'.'.$photo->getClientOriginalExtension();
        $location=public_path('images/'.$img);
        Image::make($photo)->save($location);

    
        $user->photo=$img;
        $user->type='student';
        $user->save();

        return redirect()->route('admin.students');
        

        
        

    }

    function DeleteStudent($id){
        $student = AllUser::where('id',$id);
        $student->delete();
        return redirect()->route('admin.students');

    }

    function EditStudent($id){
        $student = AllUser::where('id',$id)->get();
       // $teacher->update();
        return view('admin.pages.editstudent',compact('student'));

    }

    function UpdateStudent(Request $request,$id){
        $teacher = AllUser::find($id);
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->password=$request->password;
     
       

        
            //insertimage
           // $photo=$request->file('photo');
//$img=time().'.'.$photo->getClientOriginalExtension();
           // $location=public_path('images/'.$img);
           // Image::make($photo)->save($location);
    
        
           // $teacher->photo=$img;
        


        $teacher->number=$request->number;
        $teacher->official_id=$request->studentid;
        $teacher->type='student';
        $teacher->save();

        return redirect()->route('admin.students');

    }





    
    
}
