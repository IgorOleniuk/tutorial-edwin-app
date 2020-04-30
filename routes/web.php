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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', 'AdminPostsController@post')->name('home.post');

Route::group(['middleware'=>'admin'], function() {

  Route::get('/admin', function() {
    return view('admin.index');
  });

  Route::resource('admin/users', 'AdminUsersController');
  Route::resource('admin/posts', 'AdminPostsController');
  Route::resource('admin/categories', 'AdminCategoriesController');
  Route::resource('admin/media', 'AdminMediasController');
  Route::resource('admin/comments', 'PostCommentController');
  Route::resource('admin/comment/replies', 'CommentRepliesController');
});
Route::get('/admin', function() {
  return view('admin.index');
});