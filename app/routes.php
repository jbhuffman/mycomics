<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/login', array('uses' => 'HomeController@showLogin'));
Route::post('/login', array('uses' => 'HomeController@doLogin'));
Route::get('/logout', array('uses' => 'HomeController@doLogout'));

Route::get('/about', function()
{
    return View::make('about');
});
/*
Route::group(array('prefix' => 'titles'), function() {
    Route::get('', array('uses' => 'TitlesController@index', 'as' => 'titles.list'));
    Route::get('index', array('uses' => 'TitlesController@index', 'as' => 'titles.list'));
    Route::get('{id}', array('uses' => 'TitlesController@show', 'as' => 'titles.show'));
});
*/

Route::resource('titles', 'TitlesController');
Route::resource('mybooks', 'MyBooksController');

Route::group(array('before' => 'auth'), function()
{
    Route::resource('publishers', 'PublishersController', ['before' => 'auth']);
    Route::resource('vendors', 'VendorsController', ['before' => 'auth']);
});
/*
Route::group(array('prefix' => 'titles'), function() {
    Route::get('', array('uses' => 'TitlesController@index', 'as' => 'titles.list'));
    Route::get('create', array('uses' => 'TitlesController@create', 'as' => 'titles.create'));
    Route::get('{id}/edit', array('uses' => 'TitlesController@edit', 'as' => 'titles.edit'));
    Route::get('{id}', array('uses' => 'TitlesController@show', 'as' => 'titles.show'));
    Route::get('searchAjax', array('uses' => 'TitlesController@searchAjax', 'as' => 'titles.searchAjax'));

    Route::put('store', array('uses' => 'TitlesController@store', 'as' => 'titles.store'));
    Route::put('update/{id}', array('uses' => 'TitlesController@update', 'as' => 'titles.update'));
});
*/
