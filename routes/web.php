<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\JabatanController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    // Master Data Routes
    Route::resource('agama', AgamaController::class);
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('unit-kerja', UnitKerjaController::class);
    Route::resource('jabatan', JabatanController::class);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
