<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth:api'])->group(function () {
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  Route::post('/task/create', [TaskController::class, 'create'])->name('task.create');
  Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
  Route::get('/task/{id}', [TaskController::class, 'view'])->name('task.view');
  Route::post('/task/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
  Route::post('/task/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
});
