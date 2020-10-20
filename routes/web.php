<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test','TestController@index');

Route::get('/api/books','APIBookController@index');
Route::get('/books','BookController@index')->name('books');
Route::get('/books/create', 'BookController@create');
Route::get('books/{id}', 'BookController@show');
Route::post('/books', 'BookController@store');

Route::get('/publishers', 'PublisherController@index');
Route::get('publishers/{publisher_id}', 'PublisherController@show');

Route::get('/eshop', 'EshopController@index');
Route::get('eshop/categories/{id}', 'EshopController@category');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/create', 'CategoryController@create');
Route::get('/categories/{id}', 'CategoryController@show');
Route::post('/categories', 'CategoryController@store');

Route::get('/subcategories', 'EshopController@subcategory');
Route::get('/subcategories/{id}', 'EshopController@subcategory');

Route::get('/genres', 'GenreController@index');
Route::get('/genres/create', 'GenreController@create');
Route::get('/genres/{id}', 'GenreController@show');
Route::post('/genres', 'GenreController@store');

