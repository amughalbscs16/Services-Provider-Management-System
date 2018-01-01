<?php

namespace App\Http\Controllers;
use Validator, Hash;
use Illuminate\Http\Request;
use App\People;
class PeopleController extends Controller
{
  function getUserProfile()
  {
    if(strtoupper(auth()->user()->role)=="USER"){
    $user = auth()->user();
    $person = People::where('user_id','=',$user->id)->first();
    //dd($user);
    return view('user.profile')->with('user',$user)->with('person',$person)->with('message',"Edit User Profile");
    }
    else return back();
  }
  function postUserProfile(Request $request)
  {
    if(strtoupper(auth()->user()->role)=="USER"){
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
  } else return back();
}
  function postServiceRatings(Request $request)
  {
    $validator = Validator::make($request->all(), [
            'rating' => 'required|max:255',
            'service_id' => 'required',
            'provider_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('message',"Try Again");
        }
        else {
          $people = People::where('user_id','=',$request->user_id)->get()->first();
          $serviceprovider = \App\ServiceProvider::where('service_id','=',$request->service_id)->where('provider_id','=',$request->provider_id)->get()->first();
          $rating = \App\Rating::where('sp_id','=',$serviceprovider->id)->where('people_id','=',$people->id)->get()->first();
          if($rating)
          {
            $serviceprovider->rating = ((($serviceprovider->rating*$serviceprovider
            ->rating_count) - $rating->rating + $request->rating)/$serviceprovider->rating_count); //Subtract Old Rating
            $serviceprovider->save();
            $rating->rating = $request->rating;
            $rating->save();
            return back()->with('message', 'Rating Successfully Edited');
          }
          else {

            $rating = \App\Rating::create(
              ['people_id' => $people->id,
              'sp_id' => $serviceprovider->id,
              'rating' => $request->rating,
            ]);
            $serviceprovider->rating_count += 1;
            $serviceprovider->rating = ((($serviceprovider->rating)*($serviceprovider->rating_count - 1)+$rating->rating)/$serviceprovider->rating_count);
            $serviceprovider->save();
            return back()->with('message', 'Rating Successfully Created');
          }
        }
  }
}
