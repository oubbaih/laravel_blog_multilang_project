<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashBoardController as ControllersDashBoardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;

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
// DashBoard Routes Group
Route::prefix('dashboard')->as('dashboard.')->middleware(['auth', 'CheckUserLoginStatus'])->group(function () {
    Route::get('/', DashboardController::class . '@index')->name('dashboard');
    Route::get('/users/all', UserController::class . '@CheckAllUsers')->name('users.all');
    Route::resources([
        // Dashboard Post ()
        'post' => PostController::class,
        // User
        'user'  => UserController::class,
        //Settings 
        'setting' => SettingController::class,
    ]);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
