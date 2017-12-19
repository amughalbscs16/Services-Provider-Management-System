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


Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');







/*






Route::group(['prefix' => 'judge',  'middleware' => 'auth'], function()
{
    Route::get('dashboard', function() {
    	return view('welcome');
    } );

	Route::get('/', function () {
    	return view('welcome');
	});

});


Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('dashboard', function() {
    	return view('welcome');
    } );
});


Route::group(['prefix' => 'judge',  'middleware' => 'auth'], function()
{
    Route::get('dashboard', function() {
    	return view('welcome');
    } );
});*/