<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web', 'auth'], 'prefix' => Config::get('app.routeLang')], function () {
	Route::get('/', 'PagesController@home');
	Route::get('/projects', 'PagesController@projects');
	Route::get('/projects/{item}', 'PagesController@project_item');
	Route::get('/invest-relations', 'PagesController@invest');
	Route::get('/contacts', 'PagesController@contacts');
	Route::get('/terms', 'PagesController@terms');
	Route::get('/legal', 'PagesController@legal');
});

Route::group(['middleware' => ['ajax']], function () {
	Route::post('/ajax/', 'AjaxController@reception');	
});