<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
| Tasks Routes
*/
Route::group(array('prefix' => 'task'), function()
{
    Route::get('/',['as' => 'admin.index','uses' => 'Task\TaskController@index']);
    Route::delete('/{id}', ['as' => 'admin.index','uses' => 'Task\TaskController@delete']);
    Route::post('/', ['as' => 'admin.index','uses' => 'Task\TaskController@save']);
    Route::get('/users/{group_id}',['as' => 'admin.users.index','uses' => 'Task\TaskController@getTasksByGroupId']);
});




