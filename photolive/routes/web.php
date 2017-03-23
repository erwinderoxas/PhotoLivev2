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
Route::get('gif-booth', function () {
    return view('create-gif');
});
Route::get('regular-frame', function () {
    return view('regPage3');
});
Route::get('regular-booth', function () {
    return view('regularBooth');
});
Route::get('gif-result', function () {
    return view('gifresult');
});
Route::get('regular-result', function () {
    return view('regularresult');
});

// Route::get('merge', function () {
//     return view('trash/mergeTest');
// });

// Route::get('regular-result/{quan}/{picture}','regularresult@index');


Route::post('upload','uploadcontroller@index');
Route::get('postregresult/{resPic}','regresultcoontroller@index');
Route::post('mergepic','mergecon@index');
Route::get('upload', function () {
    return view('upload');
});
Route::get('creategif/{first}/{second}/{third}','gifcontroller@index');