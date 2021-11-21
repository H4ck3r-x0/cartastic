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

// Clients
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/clients', function () {
    return view('clients.index');
})->name('clients');

// View Client Invoices
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/client/{client}/invoices', function () {
    return view('ClientInvoices.index');
})->name('viewClientInvoices');


// View Client Invoices
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/appointments', function () {
    return view('appointments.index');
})->name('appointments');
