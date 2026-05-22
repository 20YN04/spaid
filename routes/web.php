<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TriageController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::get('/locale/{locale}', [LocaleController::class, 'switch'])
    ->where('locale', 'nl|fr')
    ->name('locale.switch');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::get('/triage', [TriageController::class, 'show'])->name('triage.show');
    Route::post('/triage', [TriageController::class, 'store'])->name('triage.store');

    Route::middleware('triage.completed')->group(function (): void {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/programmas/{programSlug}', [ProgramController::class, 'show'])
            ->where('programSlug', 'adhd|autisme|angst|dyslexie|dyscalculie')
            ->name('programs.show');

        Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
        Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    });
});
