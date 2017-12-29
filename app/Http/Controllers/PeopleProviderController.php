<?php

namespace App\Http\Controllers;
use App\Service;
use DB;
use App\ServiceProvider;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class PeopleProviderController extends Controller
{
  function getHomeView()
  {
    $countries = ServiceProvider::groupBy('country')->pluck('country','country');
    if(auth()->check()){
        return view('home')->with('message','Successfully Logged in')->with('name',auth()->user()->name)->with('countries',$countries);
    }
    else return view('home')->with('name', 'User')->with('message', 'Welcome')->with('countries',$countries);
  }
  function postUserCountry(Request $request)
  {
    $countries = ServiceProvider::groupBy('country')->pluck('country','country');
    $services = ServiceProvider::select('services.name')->
    join('services','service_providers.service_id','=','services.id')->where('country','=',$request->country)->
    groupBy('services.name')->pluck('services.name','services.name');
    $cities = ServiceProvider::groupBy('city')->pluck('city','city');
    return view('homesearch')->with('message',' ')->with('countries',$countries)->with('services',$services)->
    with('cities',$cities)->with('showservices',null)->with('selectedcountry',$request->country);
  }

  function postServicesData(Request $request)
  {
    $countries = ServiceProvider::groupBy('country')->pluck('country','country');
    $services = ServiceProvider::select('services.name')->
    join('services','service_providers.service_id','=','services.id')->where('country','=',$request->country)->
    groupBy('services.name')->pluck('services.name','services.name');
    $cities = ServiceProvider::groupBy('city')->pluck('city','city');
    $providedservices = ServiceProvider::select()->
    join('services','service_providers.service_id','=','services.id')->where('service_providers.city','=',$request->city)->where('services.name','=',$request->name)->get()->all();
    return view('homesearch')->with('message',' ')->with('countries',$countries)->with('services',$services)->
    with('cities',$cities)->with('showservices',1)->with('selectedcountry',$request->country)->with('providedservices',$providedservices)->with('location',$request->location);
  }

  function getServiceAdmin(){
    $services = Service::get()->all();
    return view('admin.addservice')->with('message', 'Add Services')->with('services', $services);
  }
  function postServiceAdmin(Request $request){
    $service = new Service;
    $service->specification = $request->specification;
    $service->name = $request->name;
    $service->save();
    return back()->with('message', 'Service Successfully Added to List');
  }
  function editServiceAdmin(Request $request){
    $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:25',
            'specification' => 'required|max:25',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('message',"Try Again");
        }
        else{
          $service = Service::find($request->id);
          if($service)
          {
          $service->name = $request->name;
          $service->specification = $request->specification;
          $service->save();
          return back()->with('message', 'Service Successfully Removed to List');
          }
          else
          {
             return back()->with('message', 'Service with Id Not Removed to List');
          }
        }
  }
  function searchServiceProvider($sid,$pid,$location)
  {
    return ($sid);
  }
}
