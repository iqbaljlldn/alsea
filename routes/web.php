<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AttachmentController;

Route::get('/', function () {
    return view('welcome');
});

