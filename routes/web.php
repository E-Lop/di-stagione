<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Pagina principale - prodotti di stagione
Route::get('/', [ProductController::class, 'index'])->name('home');

// Pagina dettaglio prodotto
Route::get('/prodotti/{slug}', [ProductController::class, 'show'])->name('products.show');

// API endpoints
Route::prefix('api')->group(function () {
    Route::get('/products/month/{month}', [ProductController::class, 'byMonth'])->name('api.products.month');
    Route::get('/products/season/{season}', [ProductController::class, 'bySeason'])->name('api.products.season');
    Route::get('/products/search', [ProductController::class, 'search'])->name('api.products.search');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
