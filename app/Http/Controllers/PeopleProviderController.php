<?php

namespace App\Http\Controllers;
use App\Service;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class PeopleProviderController extends Controller
{
  function getHomeView()
  {
    if(auth()->check()){
        return view('home')->with('message','Successfully Logged in')->with('name',auth()->user()->name);
    }
    else return view('home')->with('name', 'User')->with('message', 'Welcome');
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
}
