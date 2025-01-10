<?php

declare(strict_types = 1);

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //region Communication
    Route::get('/comunicacoes', App\Http\Controllers\Communication\IndexController::class)->name('communication.index');
    Route::get('/comunicacao/{communication}', function () {
        return 'oi';
    })->name('communication.show');
    //endregion

    //region Peças Jurídicas
    Route::get('/pecas-juridicas', function () {
        return Inertia::render('Pecas/Index');
    })->name('pecas.index');

    Route::get('/pecas-juridicas/alegacoes-finais/', [App\Http\Controllers\FinalStatementController::class, 'index'])->name('final-statement.index');
    Route::post('/pecas-juridicas/alegacoes-finais', [App\Http\Controllers\FinalStatementController::class, 'store'])->name('final-statement.store');
    Route::get('/pecas-juridicas/alegacoes-finais/show', [App\Http\Controllers\FinalStatementController::class, 'show'])->name('final-statement.show');
    Route::post('/upload', [App\Http\Controllers\FinalStatementController::class, 'uploadFiles'])->name('upload.store');
    //endregion
});

require __DIR__ . '/auth.php';
