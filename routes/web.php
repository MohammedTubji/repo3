<?php


Route::get('/', 'TaskController@index');
Route::get('task/{id}','TaskController@show');
Route::post('store','TaskController@store');
Route::delete('delete/{id}','TaskController@destory');
 Route::post('edit/{id}','TaskController@edit');
 Route::post('edit/update/{id}','TaskController@update');
