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

Route::get('', 'TitlesController@index');

Route::group(array('before' => 'auth'), function()
{
    Route::resource('titles', 'TitlesController');
    Route::resource('mybooks', 'MyBooksController');
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

/*
Route::group(array('prefix' => 'mybooks'), function() {
    Route::get('', array('uses' => 'MyBooksController@index', 'as' => 'mybooks.list'));
    Route::get('/create', array('uses' => 'MyBooksController@create', 'as' => 'mybooks.create'));
    Route::get('/{id}/edit', array('uses' => 'MyBooksController@edit', 'as' => 'mybooks.edit'));
    Route::get('/{id?}', array('uses' => 'MyBooksController@show', 'as' => 'mybooks.show'));

    Route::put('store', array('uses' => 'MyBooksController@store', 'as' => 'mybooks.store'));
    Route::put('update/{id}', array('uses' => 'MyBooksController@update', 'as' => 'mybooks.update'));
});
*/

/*
Route::group(array('prefix' => 'publishers'), function() {
    Route::get('', array('uses' => 'PublishersController@index', 'as' => 'publishers.list'));
    Route::get('/create', array('uses' => 'PublishersController@create', 'as' => 'publishers.create'));
    Route::get('/{id}/edit', array('uses' => 'PublishersController@edit', 'as' => 'publishers.edit'));
    Route::get('/{id?}', array('uses' => 'PublishersController@show', 'as' => 'publishers.show'));

    Route::put('store', array('uses' => 'PublishersController@store', 'as' => 'publishers.store'));
    Route::put('update/{id}', array('uses' => 'PublishersController@update', 'as' => 'publishers.update'));
});
*/

/*
Route::group(array('prefix' => 'vendors'), function() {
    Route::get('', array('uses' => 'VendorsController@index', 'as' => 'vendors.list'));
    Route::get('/create', array('uses' => 'VendorsController@create', 'as' => 'vendors.create'));
    Route::get('/{id}/edit', array('uses' => 'VendorsController@edit', 'as' => 'vendors.edit'));
    Route::get('/{id?}', array('uses' => 'VendorsController@show', 'as' => 'vendors.show'));

    Route::put('store', function()
    {
        var_dump($_POST);
    });
    Route::put('store', array('uses' => 'VendorsController@store', 'as' => 'vendors.store'));
    Route::put('update/{id}', array('uses' => 'VendorsController@update', 'as' => 'vendors.update'));
});
*/
/*
Route::resource('orderss', 'OrderController');
Route::resource('shipments', 'ShipmentController');
Route::resource('users', 'UserController');
*/
