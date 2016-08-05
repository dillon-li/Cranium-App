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

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
  return view('about');
});

// Cardset CRUD
Route::group(['prefix' => 'cardset', 'middleware' =>'auth'], function() {
  Route::get('/', 'CardsetController@index');
  Route::get('create', 'CardsetController@createPage');
  Route::post('create', 'CardsetController@create');
  Route::get('{set_id}', 'CardsetController@viewCardset');
  Route::get('edit/{cardset_id}', 'CardsetController@editPage');
  Route::post('edit', 'CardsetController@edit');
  Route::get('delete/{set_id}', 'CardsetController@delete');
});

// Cardcolor CRUD
Route::group(['prefix' => 'cardcolor', 'middleware' =>'auth'], function() {
  Route::get('create/{cardset_id}', 'CardcolorController@createPage');
  Route::post('create-color', 'CardColorController@create');
  Route::get('edit/{color_id}', 'CardcolorController@editPage');
  Route::post('edit', 'CardcolorController@edit');
  Route::get('delete/{color_id}', 'CardcolorController@delete');
  Route::get('remove-image/{color_id}', 'CardcolorController@removeImage');
});

// Cardtype CRUD
Route::group(['prefix' => 'cardtype', 'middleware' =>'auth'], function() {
  Route::get('create/{color_id}', 'CardtypeController@createPage');
  Route::post('create-type', 'CardtypeController@create');
  Route::get('edit/{type_id}', 'CardtypeController@editPage');
  Route::post('edit', 'CardtypeController@edit');
  Route::get('delete/{type_id}', 'CardtypeController@delete');
  Route::get('{type_id}', 'CardtypeController@viewCards');
});

// Card CRUD
Route::group(['prefix' => 'card', 'middleware' =>'auth'], function() {
  Route::get('create/{type_id}', 'CardController@createPage');
  Route::post('create-card', 'CardController@create');
  Route::get('edit/{card_id}', 'CardController@editPage');
  Route::post('edit', 'CardController@edit');
  Route::get('delete/{card_id}', 'CardController@delete');
});

// Basic seeder - will add different ones later
Route::group(['prefix' => 'seeding', 'middleware' =>'auth'], function() {
  Route::get('{id}/basic', 'SeedController@basic');
});

// Game flow stuff
Route::group(['prefix' => 'play', 'middleware' =>'auth'], function() {
  Route::get('{cardset_id}', 'GameController@start');
  Route::post('/', 'GameController@newCard');
  Route::post('/skip', 'GameController@skip');
});
