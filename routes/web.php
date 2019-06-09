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

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PictureController@index');
Route::get('/formAddPicture', 'PictureController@formAddPicture');
Route::get('/viewPicture/{id}', 'PictureController@viewPicture')->name('viewPicture');
Route::post('/addPicture', 'PictureController@addPicture')->name('addPicture');


