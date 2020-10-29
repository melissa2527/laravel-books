<?php

use Illuminate\Support\Facades\Route;

Route::get('/books', 'BookController@index')->name('admin.books.index');
Route::get('books/{book_id}/edit', 'BookController@edit')->name('admin.books.edit');
Route::put('/books/{book_id}', 'BookController@update')->name('admin.books.update');