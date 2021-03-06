<?php

// Screener
Route::get( '/', 'ScreenerController@getIndex');
Route::post('/', 'ScreenerController@postIndex');
Route::post('/giveaway', 'ScreenerController@postGiveaway');
Route::get( '/success', 'ScreenerController@getSuccess');

// Login/Logout
Route::get( '/login', 'LoginController@getIndex');
Route::post('/login', 'LoginController@postIndex');
Route::get( '/register','LoginController@getRegister');
Route::post('/register','LoginController@postRegister');
Route::get('/logout', 'LoginController@getLogout');

// Diary
Route::group(array('prefix' => 'diary', 'before' => 'auth'), function()
{
	Route::get('/', 			'DiaryController@getIndex');
    Route::get('/help', 		'DiaryController@getHelp');
    Route::get('/entry', 		'DiaryController@getEntry');
    Route::get('/entry/{id}', 	'DiaryController@editEntry');
    Route::post('/entry/{id}', 	'DiaryController@postEntry');
	
	Route::post('/service', 		'DiaryController@postService');
});
