<?php

use App\Http\Controllers\ClanarinaController;
use App\Http\Controllers\ClanController;
use App\Http\Controllers\ClanskiUseCaseController;
use App\Http\Controllers\TrenerController;
use App\Http\Controllers\TreningTerminController;
use App\Models\Clan;
use App\Models\Trener;
use App\Models\TreningTermin;

Route::get('/', function () {
    return view('home');
});

Route::post('/termini/zakazi', [ClanskiUseCaseController::class, 'zakaziTrening'])->name('termini.zakazi');
Route::patch('/termini/{treningTermin}/otkazi', [ClanskiUseCaseController::class, 'otkaziTrening'])->name('termini.otkazi');
Route::get('/clanovi/{clan}/status-clanarine', [ClanskiUseCaseController::class, 'statusClanarine'])->name('clanovi.status-clanarine');
Route::resource('treners', TrenerController::class);
Route::resource('clans', ClanController::class);
Route::resource('clanarinas', ClanarinaController::class);
Route::resource('trening-termins', TreningTerminController::class);

Route::get('/zakazivanje', function () {
    return view('public.zakazivanje', [
        'clanovi' => Clan::orderBy('prezime')->get(),
        'treneri' => Trener::orderBy('prezime')->get(),
        'termini' => TreningTermin::with(['clan', 'trener'])->orderByDesc('datum_i_vreme')->take(15)->get(),
    ]);
})->name('public.zakazi.form');

Route::post('/termini/{treningTermin}/otkazi-form', function (TreningTermin $treningTermin) {
    if ($treningTermin->status !== 'zakazan') {
        return back()->with('error', 'Možeš otkazati samo termin koji je zakazan.');
    }
    $treningTermin->update(['status' => 'otkazan']);

    return back()->with('success', 'Termin je otkazan.');
})->name('public.otkazi.form');

Route::get('/status-clanarine', function () {
    return view('public.status', [
        'clanovi' => Clan::orderBy('prezime')->get(),
    ]);
})->name('public.status.form');

Route::get('/status-clanarine/{clan}', function (Clan $clan) {
    return view('public.status_result', ['clan' => $clan]);
})->name('public.status.result');
