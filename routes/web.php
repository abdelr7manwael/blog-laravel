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


//guest
Route::get('/', function () {return redirect('/posts');});
//posts
Route::get('/posts','App\Http\controllers\PostController@index');
Route::get('/posts/show/{id}','App\Http\controllers\PostController@show');
Route::get('/message/create','App\Http\controllers\MessageController@create');
Route::post('/message/store','App\Http\controllers\MessageController@store');

Route::middleware('isadmin')->group(function(){
Route::get('/posts/create','App\Http\controllers\PostController@create');
Route::post('/posts/store','App\Http\controllers\PostController@store');
Route::get('/posts/edit/{id}','App\Http\controllers\PostController@edit');
Route::post('/posts/update/{id}','App\Http\controllers\PostController@update');
Route::get('/posts/delete/{id}','App\Http\controllers\PostController@delete');
Route::get('/admins',function(){return redirect('admins/list');});
Route::get('/admins/list','App\Http\controllers\AdminController@index');
Route::get('/admins/create','App\Http\controllers\AdminController@create');
Route::post('/admins/store','App\Http\controllers\AdminController@store');
Route::get('/admins/destroy/{id}','App\Http\controllers\AdminController@destroy');
Route::get('/admins/logout','App\Http\controllers\AdminController@logout');
Route::get('/message',function(){return redirect('message/list');});
Route::get('/message/list','App\Http\controllers\MessageController@index');
Route::get('/message/destroy/{id}','App\Http\controllers\MessageController@destroy');
});
Route::get('/admins/login','App\Http\controllers\AdminController@login');
Route::post('/admins/handlelogin','App\Http\controllers\AdminController@handlelogin');



