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
Route::post('/books', 'BookController@store');
Route::get('/books/{id}', 'BookController@show');
Route::get('/books/{id}/edit', 'BookController@edit');
Route::put('/books/{id}', 'BookController@update');
Route::delete('/books/{id}', 'BookController@destroy');


Route::post('/books/{book_id}/addtoorder', 'BookController@addToOrder')->name('books.add-to-order');

Route::get('/publishers', 'PublisherController@index');
Route::get('publishers/{publisher_id}', 'PublisherController@show');

Route::get('/eshop', 'EshopController@index');
Route::get('eshop/categories/{id}', 'EshopController@category');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/create', 'CategoryController@create');
Route::get('/categories/{id}', 'CategoryController@show');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/{id}/edit', 'CategoryController@edit');
Route::put('/categories/{id}', 'CategoryController@update');
Route::delete('/categories/{id}', 'CategoryController@destroy');

// Route::get('/subcategories', 'EshopController@subcategory');
// Route::get('/subcategories/{id}', 'EshopController@subcategory');

Route::get('subcategories', 'SubcategoryController@index');
Route::get('/subcategories/create', 'SubcategoryController@create');
Route::get('/subcategories/{id}', 'SubcategoryController@show');
Route::post('/subcategories', 'SubcategoryController@store');
Route::get('/subcategories/{id}/edit', 'SubcategoryController@edit');
Route::put('/subcategories/{id}', 'SubcategoryController@update');
Route::delete('/subcategories/{id}', 'SubcategoryController@destroy');

Route::get('/genres', 'GenreController@index');
Route::get('/genres/create', 'GenreController@create');
Route::get('/genres/{id}', 'GenreController@show');
Route::post('/genres', 'GenreController@store');

Route::get('/bookshops', 'BookshopController@index');
Route::get('/bookshops/create', 'BookshopController@create');
Route::get('bookshops/{id}', 'BookshopController@show');
Route::post('/bookshops', 'BookshopController@store');

Route::post('/books/{book_id}/review', 'BookController@review');
