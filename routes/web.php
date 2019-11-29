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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/content', 
    function () {
        return view('content');
    }
);

Route::get('/navbar', function () {
    return view('layouts.navbar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('owner')->middleware('isOwner')->group(function()
{
    Route::get('/','OwnerController@dashboard');
});

Route::prefix('admin')->middleware('isAdmin')->group(function()
{
    Route::get('/','AdminController@dashboard');
});

Route::prefix('karyawan')->middleware('isKaryawan')->group(function()
{
    Route::get('/','KaryawanController@dashboard');
});