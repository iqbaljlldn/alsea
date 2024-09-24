<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\RoleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('role', [RoleController::class, 'index'])->name('role');
Route::get('role/{id}', [RoleController::class, 'show'])->name('role-show');
Route::post('role/store', [RoleController::class, 'store'])->name('role-store');
Route::put('role/{id}', [RoleController::class, 'update'])->name('role-update');
Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('role-delete');

Route::get('attachment', [AttachmentController::class, 'index'])->name('attachment');
Route::get('attachment/{id}', [AttachmentController::class, 'show'])->name('attachment-show');
Route::post('attachment/store', [AttachmentController::class, 'store'])->name('attachment-store');
Route::put('attachment/{id}', [AttachmentController::class, 'update'])->name('attachment-update');
Route::delete('attachment/{id}', [AttachmentController::class, 'destroy'])->name('attachment-delete');

Route::get('company', [CompanyController::class, 'index'])->name('company');
Route::get('company/{id}', [CompanyController::class, 'show'])->name('company-show');
Route::post('company/store', [CompanyController::class, 'store'])->name('company-store');
Route::put('company/{id}', [CompanyController::class, 'update'])->name('company-update');
Route::delete('company/{id}', [CompanyController::class, 'destroy'])->name('company-delete');
