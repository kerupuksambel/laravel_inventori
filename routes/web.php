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

Route::get('/')->middleware(['isOwner', 'isAdmin', 'isKaryawan']);


// Route::get('/content', 
//     function () {
//         return view('content');
//     }
// );

// Route::get('/navbar', function () {
    //     return view('layouts.navbar');
    // });
//For AJAX Request
Route::get('/kasir/ajax', 'KasirController@ajax_result');
Route::get('/kasir/ajax_search', 'KasirController@ajax_search');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('owner')->middleware('isOwner')->group(function()
{
    Route::get('/','AdminController@dashboard');
    Route::get('/barang/view', 'BarangController@view');
    
    Route::get('/barang/add', 'BarangController@create');
    Route::post('/barang/add/post', 'BarangController@create_post');

    Route::get('/barang/edit/{id}', 'BarangController@edit');
    Route::post('/barang/edit/post/{id}', 'BarangController@edit_post');

    Route::get('/barang/delete/{id}', 'BarangController@delete_post');
    
    Route::get('/stok', 'StokController@view');
    Route::post('/stok/post', 'StokController@add');

    Route::get('/kasir', 'KasirController@view');
    Route::post ('/kasir/post', 'KasirController@kasir_post');

    Route::get('/user/view', 'UserController@view');

    Route::get('/user/add', 'UserController@create');
    Route::post('/user/add/post', 'UserController@create_post');
    
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/edit/post/{id}', 'UserController@edit_post');

    Route::get('/user/delete/{id}', 'UserController@delete_post');

});

Route::prefix('admin')->middleware('isAdmin')->group(function()
{
    Route::get('/','AdminController@dashboard');
    Route::get('/barang/view', 'BarangController@view');
    
    Route::get('/barang/add', 'BarangController@create');
    Route::post('/barang/add/post', 'BarangController@create_post');

    Route::get('/barang/edit/{id}', 'BarangController@edit');
    Route::post('/barang/edit/post/{id}', 'BarangController@edit_post');

    Route::get('/barang/delete/{id}', 'BarangController@delete_post');

    Route::get('/stok', 'StokController@view');
    Route::post('/stok/post', 'StokController@add');

    Route::get('/kasir', 'KasirController@view');
    Route::post ('/kasir/post', 'KasirController@kasir_post');
});

Route::prefix('karyawan')->middleware('isKaryawan')->group(function()
{
    Route::get('/','KaryawanController@dashboard');
    
    Route::get('/stok', 'StokController@view');
    Route::post('/stok/post', 'StokController@add');

    Route::get('/kasir', 'KasirController@view');
    Route::post ('/kasir/post', 'KasirController@kasir_post');
});