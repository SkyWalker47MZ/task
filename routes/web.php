<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('welcome', function () {
//     return view('test');
// });



// Route::any('studentprofile/{id}', function ($id = null) {
//     echo '<h1>student id = '.$id.'</h1>';
// })->where ('id','[0-9]+');


// Route::get('welcome', 'blogcontroller@createblog');


Route::get('adduser', 'blogcontroller@createuser');

Route::post('StoreUser', 'blogcontroller@store');

Route::get('displayUsers','blogcontroller@display');

Route::get('deleteUsers/{id}','blogcontroller@delete');

Route::get('EditUsers/{id}','blogcontroller@edit');

Route::post('UpdateUsers','blogcontroller@update');


Route::resource('test','gustr');

Route::get('Login','gustr@login')->name('Login');

Route::post('doLogin','gustr@doLogin');

Route::get('LogOut','gustr@Logout');



