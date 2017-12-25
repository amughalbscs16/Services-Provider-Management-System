<?php

namespace App\Http\Controllers;
use Validator;
use Hash;
use Illuminate\Http\Request;
use App\People;
class PeopleController extends Controller
{
  function getUserProfile()
  {
    $user = auth()->user();
    $person = People::where('user_id','=',$user->id)->first();
    //dd($user);
    return view('user.profile')->with('user',$user)->with('person',$person)->with('message',"Edit User Profile");
  }
  function postUserProfile(Request $request)
  {
    $user = auth()->user();
    $person = People::where('user_id','=',$user->id)->first();
    $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'name' => 'required',
            'newpassword' => 'max:25',
            'password' => 'required|max:25',
            'address' => 'max:255',
            'city' => 'max:20',
            'country' => 'max:20',
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
            $person->address = $request->address;
            $person->city = $request->city;
            $person->country = $request->country;
            $person->save();
            return back()->with('message',"Successfully Saved");
            }
          else{ return back()->with('message', "Current Password Does Not Match");
          }
        }
  }

}
