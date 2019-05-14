<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'locale', 'prefix' => Session::get('locale')], function() {

    //Switch lang
    Route::post('/lang', 'LangController@changeLang');

    //contact
    Route::get('/', 'ContactController@index')->name('home'); 
    Route::get('/contacts', 'ContactController@index'); 
    Route::post('/contact/create', 'ContactController@store');
    Route::get('/contact/edit/{id}', 'ContactController@edit');
    Route::post('/contact/update/{id}', 'ContactController@update');
    Route::delete('/contact/delete/{id}', 'ContactController@destroy');
    Route::get('/contact/{id}', 'ContactController@show');

    //auth
    Auth::routes();
    Route::post('auth/register', 'UserController@register');
    Route::post('auth/login', 'UserController@login');
    Route::get('/profile', 'UserController@index');
    Route::get('/profile/edit', 'UserController@edit');
    Route::post('/profile/update', 'UserController@update');
// });
