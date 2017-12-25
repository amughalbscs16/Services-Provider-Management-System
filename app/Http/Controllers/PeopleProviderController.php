<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleProviderController extends Controller
{
  function getHomeView()
  {
    if(auth()->check()){
        return view('home')->with('message','Successfully Logged in')->with('name',auth()->user()->name);
    }
    else return view('home')->with('name', 'User')->with('message', 'Welcome');
  }
}
