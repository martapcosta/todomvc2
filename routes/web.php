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

Route::resource('tasks', 'TasksController');

Route::get('/', 'TasksController@index');

//Route::get('/test{param}', function ($param) {
  //  echo "test" . $param->with($param,'marta');
    //return view('test');
    //return "Hello World!!";
//});

/*Route::get('ID/{id}', function ($id) {
  return 'ID: '. $id;
});*/


//Route::get('/', 'TasksController@index');

//Route::get('/tasks/{id}', 'TasksController@show');

//Route::resource('tasks','TasksController');
//Route::get('tasks/{id}', 'TasksController@show')->name('task');
//route('task', ['id' => 1]);