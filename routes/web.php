<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
	Route::get('/home','AdminController@index')->name('admin.home');
	Route::get('/admission/new','AdmissionController@index')->name('admin.admission.new');
	Route::post('/admission/create','AdmissionController@createAdmission')->name('admin.admission.create');
	Route::get('/admission/view','AdmissionController@viewAdmissions')->name('admin.admission.view');
	Route::get('/admission/{id}','AdmissionController@admission')->name('admin.admission');
	Route::post('/admission/update','AdmissionController@updateAdmission')->name('admin.admission.update');
	Route::post('/admission/approve','AdmissionController@approveAdmission')->name('admin.admission.approve');

	Route::get('/student/new','StudentController@index')->name('admin.student.new');
	Route::post('/student/create','StudentController@createStudent')->name('admin.student.create');
	Route::get('/student/view','StudentController@viewStudents')->name('admin.student.view');
	Route::get('/student/{id}','StudentController@student')->name('admin.student');
	Route::post('/student/update','StudentController@updateStudent')->name('admin.student.update');
	Route::post('/student/delete','StudentController@deleteStudent')->name('admin.student.delete');



});
