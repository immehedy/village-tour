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

Route::get('/', 'PublicController@index')->name('index');
Route::get('post/{id}', 'PublicController@singlePost')->name('singlePost');
Route::get('/about', 'PublicController@about')->name('about');
Route::get('/contact', 'PublicController@contact')->name('contact');
Route::post('/contact', 'PublicController@contactPost')->name('contactPost');

Route::get('/admin', function(){
  return view('admin.dashboard.dashboard');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('user')->group(function(){
  Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
  Route::get('comments', 'UserController@comments')->name('userComments');
  Route::post('comment/{id}/delete', 'UserController@deleteComment')->name('deleteComment');
  Route::post('newComment', 'UserController@newComment')->name('newComment');
  Route::get('profile', 'UserController@profile')->name('userProfile');
  Route::post('profile', 'UserController@profilePost')->name('userProfilePost');
});

Route::prefix('author')->group(function(){
  Route::get('dashboard', 'AuthorController@dashboard')->name('authorDashboard');
  Route::get('posts', 'AuthorController@posts')->name('authorPosts');
  Route::get('posts/new', 'AuthorController@newPost')->name('newPost');
  Route::post('posts/new', 'AuthorController@createPost')->name('createPost');
  Route::get('post/{id}/edit', 'AuthorController@postEdit')->name('postEdit');
  Route::post('post/{id}/edit', 'AuthorController@postEditPost')->name('postEditPost');
  Route::post('post/{id}/delete', 'AuthorController@deletePost')->name('deletePost');
  Route::get('comments', 'AuthorController@comments')->name('authorComments');
});

Route::prefix('admin')->group(function(){
  Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
  Route::get('users', 'AdminController@users')->name('adminUsers');
  Route::get('posts', 'AdminController@posts')->name('adminPosts');
  Route::get('post/{id}/edit', 'AdminController@adminPostEdit')->name('adminPostEdit');
  Route::post('post/{id}/edit', 'AdminController@adminPostEditPost')->name('adminPostEditPost');
  Route::post('post/{id}/delete', 'AdminController@adminDeletePost')->name('adminDeletePost');
  Route::get('comments', 'AdminController@comments')->name('adminComments');
  Route::post('comment/{id}/delete', 'AdminController@adminDeleteComment')->name('adminDeleteComment');
  Route::get('user/{id}/edit', 'AdminController@adminEditUser')->name('adminEditUser');
  Route::post('user/{id}/edit', 'AdminController@adminUserEditUser')->name('adminUserEditUser');
  Route::post('user/{id}/delete', 'AdminController@adminDeleteUser')->name('adminDeleteUser');
});
