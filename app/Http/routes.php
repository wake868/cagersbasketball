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


/************* 
Article Routes
*************/
Route::get('/','ArticleController@index');
Route::get('article','ArticleController@index');
Route::get('article/list','ArticleController@listArticle');
Route::get('article/edit/{id}','ArticleController@editArticle');
Route::post('article/update/{id}','ArticleController@updateArticle');
Route::get('article/{id}','ArticleController@getArticle');
Route::get('home','ArticleController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);