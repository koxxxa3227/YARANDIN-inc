<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\ProjectController;
use App\Http\Controllers\Profile\ProjectTaskController;

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
Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', [ProjectController::class, 'index'])->name('home');
Route::get('locale/{locale}', [\App\Http\Controllers\PublicController::class, 'setLocale'])->name('set-locale');
Route::get('get-file/{id}', [\App\Http\Controllers\PublicController::class, 'getFile'])->name('get-file');

Route::get('/project/{id}/overview', [ProjectController::class, 'overview'])->name('project-overview');
Route::get('/project/create', [ProjectController::class, 'create'])->name('project-create');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project-edit');
Route::post('/project/save', [ProjectController::class, 'save'])->name('project-save');
Route::get('/project/{id}/delete', [ProjectController::class, 'delete'])->name('project-delete');

Route::get('/project/task/{id}/overview', [ProjectTaskController::class, 'overview'])->name('project-task-overview');
Route::get('/project/{id}/task/create', [ProjectTaskController::class, 'create'])->name('project-task-create');
Route::get('/project/task/{id}/edit', [ProjectTaskController::class, 'edit'])->name('project-task-edit');
Route::post('/project/task/save', [ProjectTaskController::class, 'save'])->name('project-task-save');
Route::get('/project/task/{id}/delete', [ProjectTaskController::class, 'delete'])->name('project-task-delete');

