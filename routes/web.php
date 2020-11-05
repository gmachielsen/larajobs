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

Route::view('demo', 'demo');

// Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

// jobs

Route::get('/', 'JobController@index');
Route::get('/vacature/create', 'JobController@create')->name("job.create");
Route::post('/vacature/store', 'JobController@store')->name('job.store');
Route::get('/vacatures/{id}/edit', 'JobController@edit')->name('job.edit');
Route::post('/vacatures/{id}/edit', 'JobController@update')->name('job.update');

Route::get('/vacatures/my-job', 'JobController@myjob')->name('my.job');
Route::get('/vacatures/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('/vacatures/applications', 'JobController@applicant')->name('applicant');
Route::get('/vacatures/alljobs', 'JobController@allJobs')->name('alljobs');

// company
Route::get('/werkgever/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('werkgever/create', 'CompanyController@create')->name('company.view');
Route::post('werkgever/create', 'CompanyController@store')->name('company.store');
Route::post('werkgever/coverphoto', 'CompanyController@coverPhoto')->name('cover.photo');
Route::post('werkgever/logo', 'CompanyController@companyLogo')->name('company.logo');

//user profile
Route::get('user/profile', 'UserController@index')->name('user.profile');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');

Route::post('user/coverletter', 'UserController@coverletter')->name('cover.letter');

Route::post('user/resume', 'UserController@resume')->name('resume');
Route::post('user/avatar', 'UserController@avatar')->name('avatar');

//employer view 
Route::view('werkgever/register', 'auth.employer-register')->name('employer.register');
Route::post('werkgevers/register', 'EmployerRegisterController@employerRegister')->name('emp.register');
Route::post('/sollicitanten/{id}', 'JobController@apply')->name('apply');

// save and unsave job 
Route::post('/save/{id}', 'FavoriteController@saveJob');
Route::post('/unsave/{id}', 'FavoriteController@unSaveJob');

// Search
Route::get('jobs/search', 'JobController@searchJobs');

//category 
Route::get('/category/{id}', 'CategoryController@index')->name('category.index');

//company
Route::get('/werkgevers', 'CompanyController@company')->name('company');

//admin
Route::get('/dashboard', 'DashboardController@index')->middleware('admin');
Route::get('/dashboard/create', 'DashboardController@create')->middleware('admin');
Route::post('/dashboard/create', 'DashboardController@store')->name('post.store')->middleware('admin');
Route::post('/dashboard/destroy', 'DashboardController@destroy')->name('post.delete')->middleware('admin');
Route::get('/dashboard/{id}/edit', 'DashboardController@edit')->name('post.edit')->middleware('admin');
Route::post('/dashboard/{id}/update', 'DashboardController@update')->name('post.update')->middleware('admin');
Route::get('/dashboard/trash', 'DashboardController@trash')->middleware('admin');
Route::get('/dashboard/{id}/trah', 'DashboardController@restore')->name('post.restore')->middleware('admin');
Route::get('/dahboard/{id}/toggle', 'DashboardController@toggle')->name('post.toggle')->middleware('admin');
Route::get('/posts/{id}/{slug}', 'DashboardController@show')->name('post.show');
Route::get('/dashboard/jobs', 'DashboardController@getAllJobs')->middleware('admin');
Route::get('/dashboard/{id}/jobs', 'DashboardController@changeJobStatus')->name('job.status')->middleware('admin');

//testimonial 
Route::get('testimonial', 'TestimonialController@index')->middleware('admin');
Route::get('testimonial/create', 'TestimonialController@create')->middleware('admin');
Route::post('testimonial/create', 'TestimonialController@store')->name('testimonial.store')->middleware('admin');

//email
Route::delete('/job/email', 'EmailController@send')->name('mail');

// frontend
Route::get('over_ons', 'FrontendController@aboutus')->name('about.us');
Route::get('nieuws', 'FrontendController@news')->name('news');
Route::get('interne-vacatures', 'FrontendController@vacancies')->name('vacancies');
Route::get('blog', 'FrontendController@blog')->name('blog');
Route::get('diensten', 'FrontendController@services')->name('services');
Route::get('aanpak', 'FrontendController@approach')->name('approach');
Route::get('neurodiversiteit', 'FrontendController@specialpeople')->name('neurodiversity');

