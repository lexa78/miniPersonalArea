<?php
Route::get('personal_area', ['as'=>'personalArea', 'uses'=>'RegisterController@account']);
Route::get('/{what?}', ['as'=>'index', 'uses'=>'RegisterController@showForm']);
Route::post('check_code', ['as'=>'checkCode', 'uses'=>'RegisterController@sendEmail']);
Route::post('check_name', ['as'=>'checkName', 'uses'=>'RegisterController@checkCode']);
Route::post('set_name', ['as'=>'setName', 'uses'=>'RegisterController@setUserName']);
Route::get('fail/{error}/{what}', ['as'=>'fail', 'uses'=>'RegisterController@fail']);
