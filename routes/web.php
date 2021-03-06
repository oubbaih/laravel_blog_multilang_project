<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\frontend\PostController as FrontendPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Models\Contact;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//FrontEnd Route Resource For Post
Route::resource('post', FrontendPostController::class);
//Show FronEnd About Page 
Route::get('about',  function () {
    return view('frontend.pages.about');
})->name('about');
//Show FronEnd Caontact Page 
Route::get('contact',  function () {
    return view('frontend.pages.contact');
})->name('contact');
Auth::routes();
// DashBoard Routes Group
Route::prefix('dashboard')->as('dashboard.')->middleware(['auth', 'CheckUserLoginStatus'])->group(function () {
    Route::get('/', DashBoardController::class . '@index')->name('dashboard');
    //Addictional Routes Of User Controller 
    Route::get('/users/all', UserController::class . '@CheckAllUsers')->name('users.all');
    Route::delete('/users/delete', UserController::class . '@delete')->name('users.delete');

    //Additional Routes of Category Routes
    Route::get('/category/all', CategoryController::class . '@CheckAllCategories')->name('category.all');
    Route::delete('/category/delete', CategoryController::class . '@delete')->name('category.delete');
    // Additional Posts Routes 
    Route::get('/post/all', PostController::class . '@CheckAllPost')->name('post.all');
    Route::delete('/post/delete', PostController::class . '@delete')->name('post.delete');
    // Additional Contact Routes 
    Route::get('/contact/all', ContactController::class . '@CheckAllContacts')->name('contact.all');
    Route::delete('/contact/delete', PostController::class . '@delete')->name('contact.delete');


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
        //About Us Page Setup
        'about'  => AboutController::class,
        //Contact Page setup
        'contact' => ContactController::class,
    ]);
});
