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

Route::get('/', 'ArticleController@index')->name('article');
Route::get('/article/list/{id}', 'ArticleController@index')->name('article.list');
Route::get('/article/{id}', 'ArticleController@page')->name('article.page');
Route::get('/word/{id}', 'ArticleController@word')->name('article.word');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sitemap.xml','SitemapController@index');
Route::get('/{id}/sitemap.xml','SitemapController@article');
Route::feeds();