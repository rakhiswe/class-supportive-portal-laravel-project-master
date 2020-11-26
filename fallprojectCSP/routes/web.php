<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Pagescontroller@index')->name('index');
Route::get('/login','Pagescontroller@login')->name('login');

// admin route
Route::group(['prefix'=>'admin'],function(){

    Route::get('/','Pagescontroller@dashboard')->name('admin.dashboard');
    Route::get('/profile','Pagescontroller@profile')->name('admin.profile');

});


Route::group(['prefix'=>'admin/students'],function(){
    

    Route::get('/','Pagescontroller@students')->name('admin.students');
    Route::get('/create','Pagescontroller@createstudent')->name('admin.createstudent');
});

Route::group(['prefix'=>'admin/teachers'],function(){
    Route::get('/','Pagescontroller@teachers')->name('admin.teachers');
    Route::get('/create','Pagescontroller@createteacher')->name('admin.createteacher');
    Route::post('/create','TeacherController@CreateTeacher')->name('admin.teachers.createteacher');
});

Route::group(['prefix'=>'admin/courses'],function(){
    Route::get('/','Pagescontroller@courses')->name('admin.courses');
    Route::get('/create','Pagescontroller@createcourse')->name('admin.createcourse');
});

// teacher route


Route::group(['prefix'=>'teacher'],function(){
    Route::get('/','Teacherpagescontroller@index')->name('teacher.dashboard');
    Route::get('/profile','Teacherpagescontroller@profile')->name('teacher.profile');
  
    Route::get('/request','Teacherpagescontroller@request')->name('teacher.request');
    Route::get('/notice','Teacherpagescontroller@notice')->name('teacher.notice');
});

Route::group(['prefix'=>'teacher/blog'],function(){
    Route::get('/','Teacherpagescontroller@blog')->name('teacher.blog');
    Route::get('/createblog','Teacherpagescontroller@createblog')->name('teacher.createblog');
});


// studentr route



Route::group(['prefix'=>'student'],function(){
    Route::get('/','Studentpagescontroller@index')->name('student.dashboard');
    Route::get('/profile','Studentpagescontroller@profile')->name('student.profile');
    Route::get('/blog','Studentpagescontroller@seeblog')->name('student.seeblog');
    Route::get('/request','Studentpagescontroller@requestforcourse')->name('student.requestforcourse');
    Route::get('/notice','Studentpagescontroller@notice')->name('student.notice');
});





