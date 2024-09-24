<?php

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin/login/', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login/', [App\Http\Controllers\AdminController::class, 'authenticate']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users/', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/create/', [App\Http\Controllers\AdminController::class, 'create_user'])->name('admin.users.create');
    Route::post('/admin/users/create/', [App\Http\Controllers\AdminController::class, 'store_user']);
    Route::patch('/admin/users/{user}/edit/', [App\Http\Controllers\AdminController::class, 'edit_user'])->name('admin.users.edit');
    Route::delete('/admin/users/{user}/delete/', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('admin.users.delete');
});

