<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FacebookLoginController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(FacebookLoginController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

Route::group(['prefix' => 'blogs', 'middleware' => ['auth']], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/submit',[BlogController::class, 'store'])->name('blogs.store');
    Route::get('/id_{id}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('/id_{id}/edit',[BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/id_{id}/update',[BlogController::class, 'update'])->name('blogs.update');
    Route::put('/id_{id}/destroy',[BlogController::class, 'destroy'])->name('blogs.destroy');
});
Route::group(['prefix' => 'categories', 'middleware' => ['auth']], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/submit',[CategoryController::class, 'store'])->name('categories.store');
    Route::get('/id_{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/id_{id}/edit',[CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/id_{id}/update',[CategoryController::class, 'update'])->name('categories.update');
    Route::put('/id_{id}/destroy',[CategoryController::class, 'destroy'])->name('categories.destroy');
});