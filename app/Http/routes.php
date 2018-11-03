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

Route::get('/', ['as'=>'portfolio_index', 'uses'=>'PortfolioController@index']);
Route::get('/projects', ['as'=>'projects', 'uses'=>'PortfolioController@projects']);
Route::get('/hobbies', ['as'=>'hobbies', 'uses'=>'PortfolioController@hobbies']);
Route::get('/contact', ['as'=>'contact', 'uses'=>'PortfolioController@contact']);
