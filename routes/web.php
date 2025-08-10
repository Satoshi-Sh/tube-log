<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use function Pest\Laravel\get;

Route::get('/', [VideoController::class, 'index']);

Route::get('/videos/{video}', [VideoController::class, 'show']);

Route::get('/categories/{category}',[CategoryController::class, 'show']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/register',[RegisteredUserController::class, 'create'])->middleware('guest');
//Route::post('/register',[RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class,'create'])->middleware('guest');
Route::post('/login',[SessionController::class, 'store'])->middleware('guest');

Route::delete('/logout',[SessionController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');

Route::get('/dashboard/categories', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/dashboard/categories', [CategoryController::class, 'store'])->middleware('auth');

Route::get('/dashboard/create/{id}', [VideoController::class, 'create'])->middleware('auth');
Route::post('/dashboard/create/{id}', [VideoController::class, 'store'])->middleware('auth');

Route::get('/dashboard/edit/{video}', [VideoController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/edit/{video}', [VideoController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/videos/{video}', [VideoController::class, 'destroy'])->middleware('auth');


