<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/user', [UserController::class, 'showSingUp'])->name('user.singup');
Route::post('/user/create', [UserController::class, 'cadastrarUsuario'])->name('user.cadastro');
Route::get('/user/show', [UserController::class, 'UserCreateSuccess'])->name('user.success');


Route::match(['get', 'post'], '/portal', [LoginController::class, 'showPortal'])->name('portal')->middleware('auth');

Route::match(['get', 'post'], '/portal/upload', [LoginController::class, 'upload'])->name('upload.document');
Route::match(['get', 'post'], '/portal/share', [LoginController::class, 'share'])->name('share.document');
Route::match(['get', 'post'], '/portal/search', [LoginController::class, 'search'])->name('search.document');