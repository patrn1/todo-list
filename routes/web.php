<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::get('/projects/{project}/tasks', [TaskController::class, 'getByProject'])->name('projects.tasks');
//     Route::get('/projects/{project}/create-task', [TaskController::class, 'create'])->name('projects.create-task');

//     Route::resource('projects', ProjectController::class);

//     Route::resource('tasks', TaskController::class);
//     Route::put('/tasks/{task}/update-timer', [TaskController::class, 'updateTimer'])->name('tasks.update-timer');

//     Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
// });

// require __DIR__.'/auth.php';

Route::get('/', function () {
    return Redirect::route('tasks.index');
});

Route::resource('tasks', TaskController::class);
