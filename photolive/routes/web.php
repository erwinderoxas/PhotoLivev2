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
    return view('index');
});

Route::get('page2', function () {
    return view('page2');
});
Route::get('create-gif', function () {
    return view('create-gif');
});

// Route::get('upload', function () {
//     return view('upload');
// });
Route::post('upload','uploadcontroller@index');
Route::get('upload', function () {
    return view('upload');
});
Route::get('creategif/{first}/{second}/{third}','gifcontroller@index');