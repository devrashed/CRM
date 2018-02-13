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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users','OurUserController@index')->name('users');
Route::post('/users','OurUserController@getUser')->name('users');
//, function () {  return view('users');}

Route::group(['middleware'=>['web']],function(){
Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::resource('developers','DeveloperController');
Route::resource('marketers','MarketerController');
Route::resource('clients','ClientController');
Route::resource('services','ServiceController');
Route::resource('discussions','DiscussionController');
Route::resource('projectstatus','ProjectStatusController');
});
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
