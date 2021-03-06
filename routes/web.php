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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/','WelcomeController@index');

Route::get('/blog','BlogController@index')->name('blog.index');
Route::get('/blog/create','BlogController@create')->name('blog.create');
Route::post('/blog/create','BlogController@store');
Route::get('/blog/edit/{id?}','BlogController@edit')->name('blog.edit');
Route::post('/blog/edit/{id?}','BlogController@update');
Route::delete('/blog/delete','BlogController@delete')->name('blog.delete');

Route::get('/post','PostController@index')->name('post.index');
Route::get('/post/create','PostController@create')->name('post.create');
Route::post('/post/create','PostController@store');

Route::get('/captha','CapthaController@index')->name('google.captha');
Route::post('/captha','CapthaController@store');


Route::get('/map','WelcomeController@googleMap')->name('map');

Route::resource('/category','CategoryController');
Route::post('/category/delete','CategoryController@delete')->name('category.delete');
Route::post('/category/update','CategoryController@updateData')->name('category.updateData');


Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/create','ProductController@create')->name('product.create');
Route::post('/product/create','ProductController@store');
Route::get('/product/edit/{id}','ProductController@edit')->name('product.edit');


Route::get('/pricing','PricingPlanController@index')->name('pricing.index');
Route::get('/pricing/create','PricingPlanController@create')->name('pricing.create');

