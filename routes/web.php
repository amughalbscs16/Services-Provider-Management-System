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
Route::get('/', 'PeopleProviderController@getHomeView' )->name('getHomeView');
<<<<<<< HEAD
Route::get('about', 'PeopleProviderController@aboutPage')->name('aboutPage');
=======
Route::post('/', 'PeopleProviderController@postUserCountry')->name('postUserCountry');
Route::post('/country', 'PeopleProviderController@postServicesData')->name('postServicesData');
Route::get('/country/{service_id}/{provider_id}/{location}', 'PeopleProviderController@searchServiceProvider')->name('searchServiceProvider');
>>>>>>> 91991b7c8e101f32f0e577bb8acd32d873b0c90d
Route::group(['middleware' => 'auth'] , function(){
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'user'], function(){
Route::get('/profile', 'PeopleController@getUserProfile')->name('getUserProfile');
Route::post('/profile', 'PeopleController@postUserProfile')->name('postUserProfile');
});

Route::group(['prefix' => 'provider'], function(){
Route::get('/profile', 'ProviderController@getProviderProfile')->name('getProviderProfile');
Route::post('/profile', 'ProviderController@postProviderProfile')->name('postProviderProfile');
Route::get('/service', 'ProviderController@getServiceProvider')->name('getServiceProvider');
Route::post('/service', 'ProviderController@postServiceProvider')->name('postServiceProvider');
});

Route::group(['prefix' => 'admin'], function(){
Route::get('/service', 'PeopleProviderController@getServiceAdmin')->name('getServiceAdmin');
Route::post('/service', 'PeopleProviderController@postServiceAdmin')->name('postServiceAdmin');
Route::post('/service', 'PeopleProviderController@editServiceAdmin')->name('editServiceAdmin');
});


});
<<<<<<< HEAD





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
=======
>>>>>>> 91991b7c8e101f32f0e577bb8acd32d873b0c90d
