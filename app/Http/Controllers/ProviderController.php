<?php

namespace App\Http\Controllers;
use Validator,Hash;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    function getProviderProfile(){
      return view('provider.profile');
    }
    function postProviderProfile(Request $request){

    }
    function getServiceProvider(){

    }
    function postServiceProvider(Request $request){

    }
}
