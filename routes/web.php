<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// // // Employee List Route
Route::get('/employeelist', function () {
    return view('employee.employeelist');
})->middleware(['auth', 'verified'])->name('employeelist');

// // // Employee Edit Route
Route::get('/employeedit', function () {
    return view('employee.employeedit');
})->middleware(['auth', 'verified'])->name('employeedit');

// // // Employee Detail Route
Route::get('/employeedetail', function () {
    return view('employee.employeedetail');
})->middleware(['auth', 'verified'])->name('employeedetail');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
