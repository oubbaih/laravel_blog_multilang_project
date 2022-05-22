<?php

use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// DashBoard Routes Group
Route::prefix('dashboard')->as('dashboard.')->middleware(['auth', 'CheckUserLoginStatus'])->group(function () {
    Route::get('/', DashBoardController::class . '@index')->name('dashboard');
    //Addictional Routes Of User Controller 
    Route::get('/users/all', UserController::class . '@CheckAllUsers')->name('users.all');
    Route::delete('/users/delete', UserController::class . '@delete')->name('users.delete');

    //Additional Routes of Category Routes
    Route::get('/category/all', CategoryController::class . '@CheckAllCategory')->name('category.all');
    Route::delete('/category/delete', CategoryController::class . '@delete')->name('category.delete');
    //===                           ===/
    Route::resources([
        // Dashboard Post ()
        'post' => PostController::class,
        // User
        'user'  => UserController::class,
        //Settings 
        'setting' => SettingController::class,
        //Categories SetUp 
        'category' => CategoryController::class,
    ]);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
