<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use View;
use DB;
use App\User;
use Redirect;
use Validator;

class TestController extends Controller
{
    public function login() {

    	return View::make('login');
    }

    public function login_save(Request $request) {

    		echo $request->name;
    }

    public function signup(){
    	$users = DB::table('tbl_user_login')->get();
    	return View::make('signup') -> with('user',$users);
    }


    public function edit_data_user(Request $request){
    	echo $request -> id;

    }


    public function test_data(){
    	echo "string";
    }

    public function view_layout(){
    	return View::make('lay');
    }


    public function upload_file(Request $request){


        // for single file uploads
        /*// cache the file
        $file = $request->file('photo');

        $photo_name = $request -> name;
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename =  $photo_name. time() . '.' . $file->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('photos', $filename);
        dd($path);*/





        // for multiple file uploads
        /*
        $photos = $request->file('photos');
        $paths  = [];

        foreach ($photos as $photo) {
            //$extension = $photo->getClientOriginalExtension();
            //$filename  = 'profile-photo-' . time() . '.' . $extension;
            $paths[]   = $photo->store('photos/my-pic');
        }

        dd($paths);
        */


        // for uploading flile validation

        $validation = $request->validate([
            'photo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
            // for multiple file uploads
            // 'photo.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $file      = $validation['photo']; // get the validated file
        $extension = $file->getClientOriginalExtension();
        $filename  = 'profile-photo-' . time() . '.' . $extension;
        $path      = $file->storeAs('photos', $filename);

        dd($path);

    }



    public function usersLogin(){
        return View::make('user_login');
    }



    public function userValidate(){

        $submitType =  request() -> action;

        if($submitType == 'login'){

            $input = request()->validate([

                'name' => 'required',
                'password' => 'required|min:5',
              //  'email' => 'required|email|unique:users',
              //  'photo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'

            ], [

                'name.required' => 'Name is required',
                'password.required' => 'Password is required',
              //  'photo.required' => 'Profile picture is required'

            ]);

              $input = request()->all();

              $user_login = DB::table('tbl_user_login')
                          ->where('user_name',$input['name'] )
                          ->where('password',$input['password'] )
                          ->get();

              if($user_login -> count() == 1){
                return View::make('home')->with('user_data',$user_login);
                //return Redirect::to('/home');
              }else{
                 return back()->with('error', 'Invalid Username or Password !');
              }

            //$file =  request()->file('photo')->store('photos/my-pic');;

            //$input['password'] = bcrypt($input['password']);

            //$user = User::create($input);



        }
    }


    public function new_test(){
    //  $res = $this -> callOneFunction();
    //  echo $res;
      $user_login = DB::table('tbl_user_login')
                  ->where('user_name','rohith')
                  ->where('password','rohith123' )
                  ->count();

      print_r($user_login);

    }

    function callOneFunction(){
    //  {"name":["The name field is required."],"password":["The password field is required."],"email":["The email field is required."]}}

      $data['name'] = ["The name field is required."];
      $data['password'] = ["The password field is required."];
      $data['email'] = ["The email field is required."];
      $data_new = array();
      foreach ($data as $key => $value) {
        echo "<p class='text-danger'>".$value[0]."</p>";
      }
      //print_r($data_new);
    }


    public function loadAjaxView(){
      return View::make('ajax_request');
    }


    public function ajaxRequestPost(Request $request){


      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'password' => 'required|min:5',
        'email' => 'required|email'
      ]);

      if ($validator->passes()) {
        return response()->json(['success'=>'Added new records.']);
      }


       $errors   = [];
       $messages = $validator->getMessageBag();
       $format   = '<p class="text-danger"> :message</p>';


       foreach ($messages->keys() as $key) {
            if(!$messages->has('name')){
            $errors['name'] = '';
          } if(!$messages->has('password')){
            $errors['password'] = '';
          } if (!$messages->has('email')) {
            $errors['email'] = '';
          }
          $errors[$key] = $messages->get($key, $format);
       }

       return response()->json(['error'=>   $errors ]);



      /*  $input = request()->all();

      if (!isset($input['name'])) {
        $data = 'no data';
      }else{
        $data = 'done';
      }

      return response()->json(['success'=>$data]);
      */

    }

}
