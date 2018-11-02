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

Route::get('/testroute', function(){
    return view('test');
});

// connect route through the controller
Route::get('/test',[
    // define uses parameter
    'uses' => 'PagesController@index'
]);

Route::get('/todo',[
    'uses' => 'TodosController@index',
    'as' => 'todos'
]);

Route::post('/create/todo',[
    'uses' => 'TodosController@store'
]);

// define route for delete operation
Route::get('/todo/delete/{id}',[
    'uses' => 'TodosController@delete',
    'as' => 'todo.delete'
]);

// define route for the update operation
Route::get('/todo/update/{id}',[
    'uses' => 'TodosController@update',
    'as' => 'todo.update'
]);

// define route to save changes of the updated data.
Route::post('/todo/save/{id}',[
    'uses' => 'TodosController@save',
    'as' => 'todo.save'
]);

// mark as completed route.
Route::get('/todo/completed/{id}',[
    'uses' => 'TodosController@completed',
    'as' => 'todos.completed'
]);

