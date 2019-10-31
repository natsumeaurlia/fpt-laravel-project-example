<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/discuss', function () {
    return view('discuss');
})->name('discuss');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/products/{id}', 'ProductController@show')->name('products.show');
Route::get('/products/category/{id}', 'ProductController@indexByCategory')->name('products.indexByCategory');

Route::post('/comments', 'CommentController@store')->name('comments.store');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::namespace('Admin')->group(function () {

        Route::namespace('Users')->group(function () {
            Route::resource('users', 'UserController');
            Route::post('users/bulk', 'UserController@bulk')->name('users.bulk');
        });

        Route::namespace('Products')->group(function () {
            Route::resource('products', 'ProductController');
            Route::post('products/bulk', 'ProductController@bulk')->name('products.bulk');
        });

        Route::namespace('Products')->group(function () {
            Route::resource('product-categories', 'ProductCategoryController');
            Route::post('product-categories/bulk', 'ProductCategoryController@bulk')->name('product-categories.bulk');
        });

        Route::namespace('Comments')->group(function () {
            Route::resource('comments', 'CommentController');
            Route::post('comments/bulk', 'CommentController@bulk')->name('comments.bulk');
        });
    });
});
