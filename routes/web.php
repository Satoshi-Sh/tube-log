<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use function Pest\Laravel\get;

Route::get('/', [VideoController::class, 'index'])->name('home');

Route::get('/videos/{video}', [VideoController::class, 'show'])->name('video');

Route::get('/categories/{category}',[CategoryController::class, 'show'])->name('categories.index');

Route::get('/dashboard/categories/edit/{category}', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/categories/edit/{category}', [CategoryController::class, 'update'])->middleware('auth')->name('categories.update');
Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'destroy'])->middleware('auth')->name('categories.destroy');

Route::get('/about', function () {
    return view('about');
});

Route::get('/register',[RegisteredUserController::class, 'create'])->middleware('guest');
//Route::post('/register',[RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class,'create'])->middleware('guest')->name('login');
Route::post('/login',[SessionController::class, 'store'])->middleware('guest');

Route::delete('/logout',[SessionController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth')->name('dashboard.index');

Route::get('/dashboard/categories', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/dashboard/categories', [CategoryController::class, 'store'])->middleware('auth')->name('categories.store');

Route::get('/dashboard/create/{id}', [VideoController::class, 'create'])->middleware('auth');
Route::post('/dashboard/create/{id}', [VideoController::class, 'store'])->middleware('auth')->name('videos.store');

Route::get('/dashboard/edit/{video}', [VideoController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/edit/{video}', [VideoController::class, 'update'])->middleware('auth')->name('videos.update');
Route::delete('/dashboard/videos/{video}', [VideoController::class, 'destroy'])->middleware('auth')->name('videos.destroy');


