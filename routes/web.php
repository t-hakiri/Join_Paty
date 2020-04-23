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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');

Route::group(['middleware' => ['auth']], function(){
  Route::resource('gameroom', 'GameRoomsController');
  // Route::resource('message', 'MessageController');
  Route::POST('message', 'MessageController@store')->name('message.store');
  // Route::resource('todo', 'TodoController');
  Route::POST('todo', 'TodoController@store')->name('todo.store');
  Route::DELETE('todo/{todo}', 'TodoController@destroy')->name('todo.destroy');
});
