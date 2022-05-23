<?php

use App\Http\Controllers\Admins\VolunteersContoller;
use App\Http\Controllers\opportunityController;
use App\Http\Controllers\registerVolunteer;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Volunteer\OppurtunitiesController;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Features;
use App\Http\Controllers\EnrollmentConrtroller;
use App\Http\Controllers\Organizations\EnrollmentController;


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

require_once __DIR__ . '/fortify.php';

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [opportunityController::class, 'index'])->name('dashboard');
});


Route::get('registerVolunteer', [registerVolunteer::class, 'index'])->middleware(['guest:' . config('fortify.guard')])
    ->name('registerVolunteer');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:volunteer', 'prefix' => 'volunteer', 'as' => 'volunteer.'], function () {
        Route::resource('opportunities', \App\Http\Controllers\Volunteers\OppurtunitiesController::class);
    });


    Route::group(['middleware' => 'role:organization', 'prefix' => '', 'as' => 'organization.'], function () {
        Route::resource('opportunities', \App\Http\Controllers\Organizations\OppurtunitiesController::class);
    });

    Route::group(['middleware' => 'role:administration', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('opportunities', \App\Http\Controllers\Admins\OppurtunitiesController::class);
        Route::resource('volunteers', \App\Http\Controllers\Admins\VolunteersController::class);
        Route::resource('organizations', \App\Http\Controllers\Admins\OrganizationsController::class);
    });
});
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:volunteer', 'prefix' => 'volunteer', 'as' => 'volunteer.'], function () {
        Route::resource('enrollments', \App\Http\Controllers\Volunteers\EnrollmentController::class);
    });


    Route::group(['middleware' => 'role:organization', 'prefix' => '', 'as' => 'organization.'], function () {
        Route::resource('enrollments', \App\Http\Controllers\Organizations\EnrollmentController::class);
    });

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('enrollments', \App\Http\Controllers\Admins\EnrollmentController::class);
    });
});
Route::post('/enrollments/{id}', 'App\Http\Controllers\EnrollmentController@completedUpdate')->name('completedUpdate');
Route::resource('volunteers', \App\Http\Controllers\Admins\VolunteersController::class);
