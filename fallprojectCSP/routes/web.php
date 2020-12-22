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
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LogoutController@logout')->name('logout');

Route::group(['middleware'=>['isadmin']],function(){

    
// admin route
Route::group(['prefix'=>'admin'],function(){

    Route::get('/','Pagescontroller@dashboard')->name('admin.dashboard');
    Route::get('/profile','Pagescontroller@profile')->name('admin.profile');
    Route::post('/profile','Pagescontroller@profileupdate');

});


Route::group(['prefix'=>'admin/students'],function(){
    

    Route::get('/','Pagescontroller@students')->name('admin.students');
    Route::get('/create','Pagescontroller@createstudent')->name('admin.createstudent');
    Route::post('/create','TeacherController@CreateStudent')->name('admin.students.createstudent');
    Route::get('/delete/{id}','TeacherController@DeleteStudent')->name('admin.students.deletestudent');
    Route::get('/edit/{id}','TeacherController@EditStudent')->name('admin.students.editstudent');
    Route::post('/edit/{id}','TeacherController@UpdateStudent')->name('admin.students.updatestudent');
});

Route::group(['prefix'=>'admin/teachers'],function(){
    Route::get('/','Pagescontroller@teachers')->name('admin.teachers');
    Route::get('/create','Pagescontroller@createteacher')->name('admin.createteacher');
    Route::post('/create','TeacherController@CreateTeacher')->name('admin.teachers.createteacher');
    Route::get('/delete/{id}','TeacherController@DeleteTeacher')->name('admin.teachers.deleteteacher');
    Route::get('/edit/{id}','TeacherController@EditTeacher')->name('admin.teachers.editteacher');
    Route::post('/edit/{id}','TeacherController@UpdateTeacher')->name('admin.teachers.updateteacher');
});

Route::group(['prefix'=>'admin/courses'],function(){
    Route::get('/','Pagescontroller@courses')->name('admin.courses');
    Route::get('/create','Pagescontroller@createcourse')->name('admin.createcourse');
    Route::post('/create','CourseController@createcourse')->name('admin.courses.createcourse');
    Route::get('/delete/{course_id}','CourseController@DeleteCourse')->name('admin.courses.deletecourse');
    Route::get('/edit/{id}','CourseController@EditCourse')->name('admin.courses.editcourse');
    Route::post('/edit/{id}','CourseController@UpdateCourse')->name('admin.courses.updatecourse');
});

Route::group(['prefix'=>'admin/assignteachers'],function(){
    Route::get('/','Pagescontroller@assignteacher')->name('admin.assignteacher');
    Route::get('/create','TeacherController@createassignteacher')->name('admin.createassignteacher');
    Route::post('/create','TeacherController@submitassignteacher')->name('admin.submitassignteacher');
    Route::get('/delete/{id}','TeacherController@DeleteAssignTeacher')->name('admin.assignteacherlist.deleteassignteacher');


});




});

Route::group(['middleware'=>['isteacher']],function(){

// teacher route


Route::group(['prefix'=>'teacher'],function(){
    Route::get('/','Teacherpagescontroller@index')->name('teacher.dashboard');
    Route::get('/profile','Teacherpagescontroller@profile')->name('teacher.profile');
    Route::post('/profile','Teacherpagescontroller@profileupdate')->name('teacher.profile');
  
    Route::get('/request','Teacherpagescontroller@request')->name('teacher.request');
    Route::get('/studentapprove/{id}','Teacherpagescontroller@studentapprove')->name('studentapprove');
    Route::get('/studentreject/{id}','Teacherpagescontroller@studentreject')->name('studentreject');

   
});

Route::group(['prefix'=>'teacher/blog'],function(){
    Route::get('/','Teacherpagescontroller@blog')->name('teacher.blog');
    Route::post('/createblog','BlogController@createblog')->name('teacher.createblog');
    Route::get('/createblog','Teacherpagescontroller@createblog')->name('teacher.createblog');
    Route::get('/delete/{id}','BlogController@DeleteBlog')->name('teacher.deleteblog');
    Route::get('/edit/{id}','BlogController@EditBlog')->name('teacher.blog.editblog');
    Route::post('/edit/{id}','BlogController@UpdateBlog')->name('teacher.blog.updateblog');
});


Route::group(['prefix'=>'teacher/notice'],function(){
    Route::get('/','Teacherpagescontroller@notice')->name('teacher.notice');
    Route::get('/create','Teacherpagescontroller@createnotice')->name('teacher.createnotice');
    Route::post('/create','NoticeController@createnotice')->name('teacher.createnotice');
    Route::get('/delete/{id}','NoticeController@DeleteNotice')->name('teacher.deletenotice');
    Route::get('/edit/{id}','NoticeController@EditNotice')->name('teacher.notice.editnotice');
    Route::post('/edit/{id}','NoticeController@UpdateNotice')->name('teacher.notice.updatenotice');

});
});

// studentr route



Route::group(['prefix'=>'student'],function(){
    Route::get('/findsection','Studentpagescontroller@findsection');
    Route::get('/findteacher','Studentpagescontroller@findteacher');
    Route::get('/','Studentpagescontroller@index')->name('student.dashboard');
    Route::get('/profile','Studentpagescontroller@profile')->name('student.profile');
    Route::get('/blog','Studentpagescontroller@seeblog')->name('student.seeblog');
    Route::get('/viewblog/{id}','Studentpagescontroller@viewblog')->name('student.viewblog');
    Route::get('/request','Studentpagescontroller@requestforcourse')->name('student.requestforcourse');
    Route::post('/request','CourseregistrationController@store');
    Route::get('/notice','Studentpagescontroller@notice')->name('student.notice');
    Route::get('/findnotice','Studentpagescontroller@findnotice');
});





