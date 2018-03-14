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

//Route::get('/', function () {
  // 	return view('welcome');
//});

// Route::group(['prefix' => 'admin'],function() {

// });





Route::get('/login','TestController@login');


Route::get('/layout','TestController@view_layout');


Route::post('save-user',['as' => 'save_user','uses' =>'TestController@login_save']);


Route::get('/sign-up','TestController@signup');


Route::post('edit-user',['as' => 'edit_user' , 'uses' => 'TestController@edit_data_user']);









/*  test for blade templates */

Route::get('/', function () { return view('pages.home'); });
Route::get('/about', function () { return view('pages.about'); });
Route::get('/projects', function () { return view('pages.projects'); });


/* test for single multiple uploads with file validation */

Route::post('/process-uploads',['as'=>'process_uploads','uses'=>'TestController@upload_file']);


/* Test user login and validation*/

Route::get('/users','TestController@usersLogin');

//user_validation

Route::post('user_validation', 'TestController@userValidator');

// user sign up


Route::get('user_signup','TestController@signup');

// check methode calling

Route::get('ajax_request','TestController@loadAjaxView');

Route::post('ajax_request', 'TestController@ajaxRequestPost');


Route::get('/test','TestController@callOneFunction');
