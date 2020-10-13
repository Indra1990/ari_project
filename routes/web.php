<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ClassController;
// ====================================================//

Route::get('login', [AuthController::class, 'login']);
Route::post('login-do', [AuthController::class, 'do_login']);
Route::get('logout', [AuthController::class, 'logout']);
// home
Route::get('/', [HomeController::class, 'index'])->middleware('check.auth');
// privileges -> user
Route::get('privileges/users', [UsersController::class, 'index'])->middleware('check.auth');
Route::get('privileges/users/update/{user}', [UsersController::class, 'update_page'])->middleware('check.auth');
Route::post('privileges/users/update/{user}', [UsersController::class, 'update_save'])->middleware('check.auth');
Route::post('privileges/users/save-privileges/{user}', [UsersController::class, 'save_privileges'])->middleware('check.auth');
// privileges -> module
Route::get('privileges/module', [ModuleController::class, 'index'])->middleware('check.auth');
Route::get('privileges/module/create-new', [ModuleController::class, 'create_page'])->middleware('check.auth');
Route::post('privileges/module/create-new', [ModuleController::class, 'create_save'])->middleware('check.auth');
// class
Route::get('class', [ClassController::class, 'index'])->middleware('check.auth');
Route::get('class/create-new', [ClassController::class, 'create_page'])->middleware('check.auth');
Route::post('class/create-new', [ClassController::class, 'create_save'])->middleware('check.auth');
Route::get('class/detail/{class}', [ClassController::class, 'class_detail'])->middleware('check.auth');
// subclass
Route::post('class/detail/{class}/create-subclass', [ClassController::class, 'addsubclass'])->middleware('check.auth');
// materies
Route::post('class/detail/{class}/create-materies', [ClassController::class, 'addmateries'])->middleware('check.auth');
Route::get('class/detail/{class}/view-materies/{subcls}', [ClassController::class, 'viewmateries'])->middleware('check.auth');
