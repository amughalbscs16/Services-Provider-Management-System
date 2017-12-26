<?php

namespace App\Http\Controllers;
use Validator,Hash;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    function getProviderProfile(){
      return view('provider.profile')->with('user',auth()->user())->with('message', ' ');
    }
    function postProviderProfile(Request $request){
      $user = auth()->user();
      $validator = Validator::make($request->all(), [
              'email' => 'required|max:255',
              'name' => 'required',
              'newpassword' => 'max:25',
              'password' => 'required|max:25',
          ]);
          if ($validator->fails()) {
              return back()->withErrors($validator)->withInput()->with('message',"Try Again");
          }
          else {
            if (Hash::check($request->password,$user->password)){
              $user->name = $request->name;
              if($request->newpassword){
              $user->password = bcrypt($request->newpassword);
              }
              $user->save();
              return back()->with('message',"Successfully Saved");
              }
            else{ return back()->with('message', "Current Password Does Not Match");
            }
          }
    }
    function getServiceProvider(){

    }
    function postServiceProvider(Request $request){

    }
}
