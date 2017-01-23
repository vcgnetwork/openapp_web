<?php

// HOME
Route::get('/', 'PagesController@index');

// SEARCH
Route::get('/search', 'PagesController@index');
Route::post('/search', 'PagesController@search');

// AUTH
Route::get('/login', 'UsersController@login');
Route::post('/login', 'UsersController@login');

Route::get('/logout', 'UsersController@logout');
Route::post('/logout', 'UsersController@logout');

Route::get('/register', 'UsersController@create');
Route::post('/register', 'UsersController@store');

Route::get('/reset-password', 'UsersController@resetPasswordEmail');
Route::post('/reset-password', 'UsersController@resetPassword');

// USERS
Route::get('/users', 'UsersController@index'); // LIST
Route::get('/users/create', 'UsersController@create'); // ADD-FORM {register user}
Route::post('/users', 'UsersController@store'); // SAVE
Route::get('/users/{id}', 'UsersController@show'); // SHOW
Route::get('/users/{id}/edit', 'UsersController@edit'); // EDIT-FORM
Route::put('/users/{id}', 'UsersController@update'); // UPDATE
Route::delete('/users/{id}', 'UsersController@destroy'); // DELETE

// CITIES
Route::get('/cities', 'CitiesController@index'); // LIST
Route::get('/cities/create', 'CitiesController@create'); // ADD-FORM
Route::post('/cities', 'CitiesController@store'); // SAVE
Route::get('/cities/{id}', 'CitiesController@show'); // SHOW
Route::get('/cities/{id}/edit', 'CitiesController@edit'); // EDIT-FORM
Route::put('/cities/{id}', 'CitiesController@update'); // UPDATE
Route::delete('/cities/{id}', 'CitiesController@destroy'); // DELETE
