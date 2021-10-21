<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Car Types
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/car_types', function () {
    return view('cars.index');
})->name('carTypes');
