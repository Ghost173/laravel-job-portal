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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'Jobcontroller@index');
Route::get('/', [App\Http\Controllers\Jobcontroller::class, 'index']);
Route::get('jobs/create', [App\Http\Controllers\Jobcontroller::class, 'create'])->name('job.post');
Route::post('jobs/create', [App\Http\Controllers\Jobcontroller::class, 'store'])->name('job.create');
Route::get('/jobs/{id}/{job}', [App\Http\Controllers\Jobcontroller::class, 'show'])->name('jobs.show');
Route::get('/jobs/my-job', [App\Http\Controllers\Jobcontroller::class, 'myjob'])->name('myjob');
Route::get('job/{id}/edit', [App\Http\Controllers\Jobcontroller::class, 'editjob'])->name('jobs.edit');
Route::post('job/{id}/edit', [App\Http\Controllers\Jobcontroller::class, 'update'])->name('jobs.update');
Route::post('/application/{id}', [App\Http\Controllers\Jobcontroller::class, 'apply'])->name('jobs.apply');
Route::get('/jobs/applicant', [App\Http\Controllers\Jobcontroller::class, 'applicant'])->name('jobs.applicant');
//jobs



Route::get('/jobs/{id}/{job}', [App\Http\Controllers\Jobcontroller::class, 'show'])->name('jobs.show');

Route::get('/company/{id}/{company}', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');

Route::get('company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.view');

Route::post('company/create', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');

Route::post('company/cover', [App\Http\Controllers\CompanyController::class, 'coverphoto'])->name('company.coverphoto');

Route::post('company/logo', [App\Http\Controllers\CompanyController::class, 'companylogo'])->name('company.logo');


// user profile
Route::get('user/profile', [App\Http\Controllers\UserprofileController::class, 'index'])->name('user.profile');

Route::post('user/profile/create', [App\Http\Controllers\UserprofileController::class, 'store'])-> name('profile.create');

Route::post('user/coverlatter', [App\Http\Controllers\UserprofileController::class, 'coverlatter'])-> name('cover.letter');

Route::post('user/resume', [App\Http\Controllers\UserprofileController::class, 'resume'])-> name('resume');

//emp reg
Route::view('employer/register', 'auth.employer-register')->name('employer.register');

Route::post('employer/register', [App\Http\Controllers\EmployerregisterController::class, 'Employerregister'])-> name('emp.register');


Route::post('user/avatar', [App\Http\Controllers\UserprofileController::class, 'avatar'])-> name('avatar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
