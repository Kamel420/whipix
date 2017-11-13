<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*register a new user*/
Route::post('/register' , 'RegisterController@register');

/*i didn't group the middleware to let the guest be able to view all public tasks as required*/
Route::group(['prefix' => 'tasks'], function(){
	/*fetch all public tasks - guests can view this*/
	Route::get('/' , 'TaskController@index');
	/*show a specific task*/
	Route::get('/{task}' , 'TaskController@show')->middleware('auth:api');
	/*create a new task*/
	Route::post('/' , 'TaskController@store')->middleware('auth:api');
	/*delete a task*/
	Route::delete('/{task}' , 'TaskController@destroy')->middleware('auth:api');
	/*update a task*/
	Route::patch('/{task}' , 'TaskController@update')->middleware('auth:api');
	/*Set a task Private */
	Route::patch('/{task}/private' , 'TaskController@toprivate')->middleware('auth:api');
	/*Set a task Deadline */
	Route::patch('/{task}/deadline' , 'TaskController@deadLine')->middleware('auth:api');
	/*toggle a task visibility between public and private*/
	Route::patch('/{task}/toggle' , 'TaskController@toggle')->middleware('auth:api');
});

/*search for specific user by sending his email or name in the body of the request */
Route::post('/search' , 'SearchUserController@search')->middleware('auth:api');