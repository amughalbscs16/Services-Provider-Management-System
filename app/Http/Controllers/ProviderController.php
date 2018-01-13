<?php

namespace App\Http\Controllers;
use Validator, Hash;
use App\ServiceProvider, App\Service, App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    function getProviderProfile(){
      if(strtoupper(auth()->user()->role)=="PROVIDER"){
      return view('provider.profile')->with('user',auth()->user())->with('message', ' ');
      }
      else return back()->with('message', ' ');
    }
    function postProviderProfile(Request $request){
      if(strtoupper(auth()->user()->role)=="PROVIDER"){
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
            else {
              return back()->with('message', "Current Password Does Not Match");
            }
          }
        }
        else return back()->with('message', ' ');
    }

    function getServiceProvider(){
      if(strtoupper(auth()->user()->role)=="PROVIDER"){
      $services = Service::get()->all();
      $provider = Provider::where('user_id','=',auth()->user()->id)->first();
      $providedservices = ServiceProvider::select('service_providers.service_id','services.name','service_providers.address'
      ,'service_providers.city','service_providers.country','services.specification','service_providers.description')->join('services','service_providers.service_id','=','services.id')->
      where('provider_id','=', $provider->id)->get();
      return view('provider.service')->with('message', ' ')->with('services', $services)->with('provider',$provider)->with(
        'providedservices', $providedservices);
    }
    else return back()->with('message', ' ');
    }
    function postServiceProvider(Request $request){
      if(strtoupper(auth()->user()->role)=="PROVIDER"){
      $validator = Validator::make($request->all(), [
        'sid' => 'required',
        'pid' => 'required',
        'address' => 'required',
        'country' => 'required|max:25',
        'city' => 'required|max:25',
        'addedit' => 'required',
        'description' => 'required|max:255'
      ]);
      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput()->with('message',"Try Again");
      }
      else{
          if($request->addedit == "add"){
            $tmpserviceprovider = ServiceProvider::where('service_id','=',$request->sid)->get()->first();


            if ($tmpserviceprovider){
              return back()->with('message','This Service is Already Added You can only Edit');
            }
            else{
            $serviceprovider = ServiceProvider::create(
               ['service_id' => $request->sid,
               'provider_id' => $request->pid,
               'address' => $request->address,
               'city' => $request->city,
               'country' => $request->country,
               'description' => $request->description,
            ]);
            //Increment Service count
            if ($serviceprovider) {
              $service = Service::find($serviceprovider->service_id)->get()->first();
              $service->count = $service->count + 1;
              $service->save();
              return back()->with('message', 'Service Provider Added Successfully');
            }
            else {
              return back()->with('message', 'Service Provider Could Not be Added Try Again!');
            }
          }
        }
        else if($request->addedit == "edit"){
          $serviceprovider = ServiceProvider::where('provider_id','=',$request->pid)->where('service_id','=',$request->sid)->get()->first();
          if($serviceprovider)
          {

            $serviceprovider->address = $request->address;
            $serviceprovider->city = $request->city;
            $serviceprovider->country = $request->country;
            $serviceprovider->description = $request->description;
            $serviceprovider->save();
            return back()->with('message', 'Successfully Edited Service with ID: '.$serviceprovider->service_id);
          }
          else{
            return back()->with('message', 'No Service Found with this ID');
          }
        }
        else {
          return back()->with('message', "You can only Edit or Add Try Again!");
        }
      }
    }
  }
}
