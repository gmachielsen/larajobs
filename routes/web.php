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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// jobs
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('/', 'JobController@index');
Route::get('/jobs/create', 'JobController@create');
Route::post('/jobs/create', 'JobController@store')->name('job.store');

// company
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('company/create', 'CompanyController@create')->name('company.view');
Route::post('company/create', 'CompanyController@store')->name('company.store');
Route::post('company/coverphoto', 'CompanyController@coverPhoto')->name('cover.photo');
Route::post('company/logo', 'CompanyController@companyLogo')->name('company.logo');

//user profile
Route::get('user/profile', 'UserController@index');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');

Route::post('user/coverletter', 'UserController@coverletter')->name('cover.letter');

Route::post('user/resume', 'UserController@resume')->name('resume');
Route::post('user/avatar', 'UserController@avatar')->name('avatar');

//employer view 
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');
