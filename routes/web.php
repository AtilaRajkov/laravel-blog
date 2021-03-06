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

Route::get('/', 'BlogController@index')
  ->name('blog.index');

Route::get('/blog/show/{post}', 'BlogController@show')
  ->name('blog.show');

//Route::resource('categories.posts', 'CategoryPostController');

Route::get('/category/{category}', 'BlogController@category')
  ->name('category');

Route::get('/author/{author}', 'BlogController@author')
  ->name('author');
