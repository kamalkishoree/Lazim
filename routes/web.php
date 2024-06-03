<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoTaskController;
use App\Http\Controllers\Web\Auth\loginController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\web\ProductController;
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

Route::get('/', [LoginController::class, 'index'])->name('user.login.index');
Route::post('login', [LoginController::class, 'login'])->name('user.login');
Route::get('/signup', [LoginController::class, 'signup'])->name('user.signup');
Route::post('/user/signup', [LoginController::class, 'createUser'])->name('user.create');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('tasks', [TaskController::class, 'index'])->name('todo.index');
    // Route::get('task/create', [TaskController::class, 'create'])->name('todo.create');
    // Route::get('task/edit', [TaskController::class, 'edit'])->name('todo.edit');
    // Route::post('task/store', [TaskController::class, 'store'])->name('todo.store');
    // Route::post('task/update', [TaskController::class, 'store'])->name('todo.update');
    // Route::get('task/destroy', [TaskController::class, 'destroy'])->name('todo.destroy');
    // Route::get('task/show', [TaskController::class, 'destroy'])->name('todo.show');

    Route::resource('todo-tasks', TodoTaskController::class);
});
