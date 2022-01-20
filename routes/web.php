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
//auth
Route::get('/auth/login','AuthController@login')->name('login');
Route::post('/auth/postlogin','AuthController@postlogin');
Route::get('/auth/logout','AuthController@logout');
Route::get('/auth/registerteacher','AuthController@registertc');
Route::post('/auth/registerteacher','AuthController@storetc');
Route::post('/auth/storetc','AuthController@storetc');
Route::get('/auth/registerstudent','AuthController@registerst');
Route::post('/auth/storest','AuthController@storest');

Route::group(['middleware'=>['auth','RoleAuth:admin']],function(){

//admin
Route::get('admin/user','UserController@index');
Route::get('admin/kesiswaan','KesiswaanController@index');
Route::delete('/admin/user/{user}','UserController@destroy');

//guru
Route::get('/admin/createteacher','TeacherController@create');
Route::post('/admin/teacher','TeacherController@store');
Route::delete('/admin/teacher/{teacher}','TeacherController@destroy');
//siswa
Route::get('/admin/createstudent','StudentController@create');
Route::post('/admin/student','StudentController@store');
Route::delete('/admin/student/{student}','StudentController@destroy');
});
//kesiswaan
Route::get('/admin/createkesiswaan','KesiswaanController@create');
Route::post('/admin/kesiswaan','KesiswaanController@store');
Route::get('/admin/kesiswaan/{kesiswaan}','KesiswaanController@show');
Route::delete('/admin/kesiswaan/{kesiswaan}','KesiswaanController@destroy');
Route::group(['middleware'=>['auth','RoleAuth:admin,guru,siswa,kesiswaan']],function(){

    Route::get('student/student','PrivateController@index');
    Route::get('teacher/teacher','PrivateController@indextc');
    Route::get('/admin/student/{mapel}/ttd','MapelController@ttd');
    Route::get('/admin/student/{student}/editfp','StudentController@editfp');
    Route::get('/admin/student/{student}/edit','StudentController@edit');
    Route::get('/admin/student/{mapel}/editmp','MapelController@edit');
    Route::get('/student/{student}/lembarprint','StudentController@lembarprint');
    Route::post('/admin/student/import','StudentController@import');
    Route::post('/admin/teacher/import','TeacherController@import');
    Route::get('/student/{student}/print','StudentController@print');
    Route::put('/mapel/ttd/{mapel}/addttd','MapelController@addttd');
    Route::put('/teacher/mapel/{mapel}','MapelController@update');
    Route::put('/admin/student/{student}','StudentController@update');
    Route::put('/admin/student/{student}/editfp','StudentController@updatefp');
    Route::post('/student/{student}/addcatatan','StudentController@addcatatan');
    Route::post('/student/{student}/addmapel','StudentController@addmapel');
    Route::get('/admin/teacher/{teacher}/edit','TeacherController@edit');
    Route::get('/admin/teacher/{teacher}/editfp','TeacherController@editfp');
    Route::put('/admin/teacher/{teacher}','TeacherController@update');
    Route::put('/admin/teacher/{teacher}/editfp','TeacherController@updatefp');
    Route::get('/admin/student/{student}','StudentController@show');
    Route::delete('/admin/student/{student}/deletemp','StudentController@destroymp');
    Route::delete('/admin/student/{student}/deletecatatan','StudentController@destroyct');
    Route::get('/admin/student','StudentController@index');
    Route::get('admin/teacher','TeacherController@index');
    Route::get('/','HomeController@Home');
    Route::get('/admin/teacher/{teacher}','TeacherController@show');
});
