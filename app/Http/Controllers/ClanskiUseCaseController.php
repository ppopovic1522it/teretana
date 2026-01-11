<?php

namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\TreningTermin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClanskiUseCaseController extends Controller
{
    
    public function zakaziTrening(Request $request)
    {
        $podaci = $request->validate([
            'clan_id' => ['required', 'exists:clans,id'],
            'trener_id' => ['required', 'exists:treners,id'],
            'datum_i_vreme' => ['required', 'date'],
            'tip' => ['required', 'string', 'max:255'],
        ]);

        return DB::transaction(function () use ($podaci) {
            $postoji = TreningTermin::query()
                ->where('trener_id', $podaci['trener_id'])
                ->where('datum_i_vreme', $podaci['datum_i_vreme'])
                ->where('status', 'zakazan')
                ->exists();

            if ($postoji) {
                return response()->json([
                    'poruka' => 'Termin nije dostupan (trener je zauzet u tom terminu).'
                ], 422);
            }

            $termin = TreningTermin::create([
                'clan_id' => $podaci['clan_id'],
                'trener_id' => $podaci['trener_id'],
                'datum_i_vreme' => $podaci['datum_i_vreme'],
                'tip' => $podaci['tip'],
                'status' => 'zakazan',
            ]);

            return response()->json([
                'poruka' => 'Trening je uspešno zakazan.',
                'termin' => $termin,
            ], 201);
        });
    }

    
    public function otkaziTrening(TreningTermin $treningTermin)
    {
        if ($treningTermin->status !== 'zakazan') {
            return response()->json([
                'poruka' => 'Možeš otkazati samo termin koji je zakazan.'
            ], 422);
        }

        $treningTermin->update([
            'status' => 'otkazan',
        ]);

        return response()->json([
            'poruka' => 'Termin je otkazan.',
            'termin' => $treningTermin,
        ]);
    }

    
    public function statusClanarine(Clan $clan)
    {
        return response()->json([
            'clan_id' => $clan->id,
            'clanski_broj' => $clan->clanski_broj,
            'status_clanarine' => $clan->status_clanarine,
        ]);
    }
}
