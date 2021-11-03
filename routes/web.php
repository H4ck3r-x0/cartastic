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


// Services
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/services', function () {
    return view('services.index');
})->name('services');


// Taxes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/taxes', function () {
    return view('taxes.index');
})->name('taxes');

// Reports
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/reports', function () {
    return view('reports.index');
})->name('reports');
