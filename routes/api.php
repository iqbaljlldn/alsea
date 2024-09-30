<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\FclContainerController;
use App\Http\Controllers\LclContainerController;

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

Route::get('driver', [DriverController::class, 'index'])->name('driver');
Route::get('driver/{id}', [DriverController::class, 'show'])->name('driver-show');
Route::post('driver/store', [DriverController::class, 'store'])->name('driver-store');
Route::put('driver/{id}', [DriverController::class, 'update'])->name('driver-update');
Route::delete('driver/{id}', [DriverController::class, 'destroy'])->name('driver-delete');

Route::get('shipment', [ShipmentController::class, 'index'])->name('shipment');
Route::get('shipment/{id}', [ShipmentController::class, 'show'])->name('shipment-show');
Route::post('shipment/store', [ShipmentController::class, 'store'])->name('shipment-store');
Route::put('shipment/{id}', [ShipmentController::class, 'update'])->name('shipment-update');
Route::delete('shipment/{id}', [ShipmentController::class, 'destroy'])->name('shipment-delete');

Route::get('fcl-container', [FclContainerController::class, 'index'])->name('fcl-container');
Route::get('fcl-container/{id}', [FclContainerController::class, 'show'])->name('fcl-container-show');
Route::post('fcl-container/store', [FclContainerController::class, 'store'])->name('fcl-container-store');
Route::put('fcl-container/{id}', [FclContainerController::class, 'update'])->name('fcl-container-update');
Route::delete('fcl-container/{id}', [FclContainerController::class, 'destroy'])->name('fcl-container-delete');

Route::get('lcl-container', [LclContainerController::class, 'index'])->name('lcl-container');
Route::get('lcl-container/{id}', [LclContainerController::class, 'show'])->name('lcl-container-show');
Route::post('lcl-container/store', [LclContainerController::class, 'store'])->name('lcl-container-store');
Route::put('lcl-container/{id}', [LclContainerController::class, 'update'])->name('lcl-container-update');
Route::delete('lcl-container/{id}', [LclContainerController::class, 'destroy'])->name('lcl-container-delete');
