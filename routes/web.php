<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/portal', [LoginController::class, 'showPortal'])->name('portal')->middleware('auth');

Route::get('/user', [UserController::class, 'showSingUp'])->name('user.signup');
Route::post('/user/create', [UserController::class, 'cadastrarUsuario'])->name('user.cadastro');
Route::get('/user/show', [UserController::class, 'UserCreateSuccess'])->name('user.success');

Route::match(['get', 'post'], '/portal/upload', [FilesController::class, 'uploadDocument'])->name('upload.document')->middleware('auth');
Route::match(['get', 'post'], '/portal/share', [FilesController::class, 'shareDocument'])->name('share.document')->middleware('auth');
Route::match(['get', 'post'], '/portal/search', [FilesController::class, 'searchDocument'])->name('search.document')->middleware('auth');
Route::match(['get', 'post'], '/portal/search/filter', [FilesController::class, 'searchFilterDocument'])->name('search.filter.document')->middleware('auth');
Route::get('/download/{id_file}', [FilesController::class, 'downloadFile'])->name('download')->middleware('auth');
Route::get('/delete/{id_file}', [FilesController::class, 'deleteFile'])->name('delete')->middleware('auth');
