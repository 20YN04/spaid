<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TriageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/programmas', [HomeController::class, 'programmas'])->name('programmas.index');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::view('/privacy', 'legal.privacy')->name('legal.privacy');
Route::view('/voorwaarden', 'legal.terms')->name('legal.terms');
Route::view('/cookies', 'legal.cookies')->name('legal.cookies');
Route::view('/toegankelijkheid', 'legal.accessibility')->name('legal.accessibility');

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
