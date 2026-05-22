<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TriageController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::get('/triage', [TriageController::class, 'show'])->name('triage.show');
    Route::post('/triage', [TriageController::class, 'store'])->name('triage.store');

    Route::middleware('triage.completed')->group(function (): void {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/programmas/{programSlug}', [ProgramController::class, 'show'])
            ->where('programSlug', 'adhd|autisme|angst|dyslexie|dyscalculie')
            ->name('programs.show');
    });
});
