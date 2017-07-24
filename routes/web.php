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

Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

 Route::prefix('admin')->group(function() {
   Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
   Route::get('/', 'AdminController@index')->name('admin.dashboard');
   /*Route::get('/blog', 'BlogController@index')->name('admin.blog');
   Route::get('/blog/create', 'BlogController@create')->name('admin.blog.create');
   Route::post('/blog/destroy', 'BlogController@destroy')->name('admin.blog.destroy');
   Route::get('/blog/{id}/edit', 'BlogController@edit')->name('admin.blog.edit');
   Route::post('/blog/update/{id}', 'BlogController@update')->name('admin.blog.update');
   Route::post('/blog/store', 'BlogController@store')->name('admin.blog.store');*/
   Route::resource('/blog', 'BlogController');
   Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

   // Password reset routes
   Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
   Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
   Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
   Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
 });
