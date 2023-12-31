<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Mis rutas
Route::get('/task', [TaskController::class, 'index' ])->name('task.index');
Route::post('/task', [TaskController::class, 'store' ])->name('task.store');
Route::patch('/task/{id}', [TaskController::class, 'update' ])->name('task.update');
Route::delete('/task/{id}', [TaskController::class, 'destroy' ])->name('task.destroy');
Route::get('/task/{id}', [TaskController::class, 'show' ])->name('task.show');

