<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ClanskiUseCaseController;

Route::post('/termini/zakazi', [ClanskiUseCaseController::class, 'zakaziTrening'])->name('termini.zakazi');
Route::patch('/termini/{treningTermin}/otkazi', [ClanskiUseCaseController::class, 'otkaziTrening'])->name('termini.otkazi');
Route::get('/clanovi/{clan}/status-clanarine', [ClanskiUseCaseController::class, 'statusClanarine'])->name('clanovi.status-clanarine');

