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


Route::prefix('dashboard')->name('admin.')->middleware('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('index');

    Route::get('/blogs', 'BlogController@index')->name('blogs.index');
    Route::get('/blogs/create', 'BlogController@create')->name('blogs.create');
    Route::post('/blogs/store', 'BlogController@store')->name('blogs.store');
    Route::get('/blogs/{id}/edit', 'BlogController@edit')->name('blogs.edit');
    Route::post('/blogs/{id}/update', 'BlogController@update')->name('blogs.update');
    Route::post('/blogs/{id}/delete', 'BlogController@delete')->name('blogs.delete');

    Route::get('/news', 'NewsController@index')->name('news.index');
    Route::get('/news/create', 'NewsController@create')->name('news.create');
    Route::post('/news/store', 'NewsController@store')->name('news.store');
    Route::get('/news/{id}/edit', 'NewsController@edit')->name('news.edit');
    Route::post('/news/{id}/update', 'NewsController@update')->name('news.update');
    Route::post('/news/{id}/delete', 'NewsController@delete')->name('news.delete');

    Route::get('/employers', 'CompanyController@index')->name('company.index');
    Route::get('/employers/{id}/edit', 'CompanyController@edit')->name('company.edit');
    Route::post('/employers/{id}/update', 'CompanyController@update')->name('company.update');
    Route::post('/employers/{id}/delete', 'CompanyController@delete')->name('company.delete');

    Route::get('/staffmembers', 'StaffController@index')->name('staffmembers.index');
    Route::get('/staffmembers/create', 'StaffController@create')->name('staffmembers.create');
    Route::post('/staffmembers/store', 'StaffController@store')->name('staffmembers.store');
    Route::get('/staffmembers/{id}/edit', 'StaffController@edit')->name('staffmembers.edit');
    Route::post('/staffmembers/{id}/update', 'StaffController@update')->name('staffmembers.update');
    Route::post('/staffmembers/{id}/delete', 'StaffController@delete')->name('staffmembers.delete');

    Route::get('/profiles', 'ProfileController@index')->name('profiles.index');
});

