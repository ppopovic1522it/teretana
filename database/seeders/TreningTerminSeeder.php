<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TreningTermin;
use App\Models\Clan;
use Carbon\Carbon;

class TreningTerminSeeder extends Seeder
{
    public function run(): void
    {
        TreningTermin::query()->delete();

        foreach (Clan::all() as $index => $clan) {
            TreningTermin::create([
                'datum_i_vreme' => Carbon::now()->addDays(1)->setTime(18, 0),
                'tip' => 'individualni',
                'status' => 'zakazan',
                'clan_id' => $clan->id,
                'trener_id' => $clan->izabrani_trener_id,
            ]);

            TreningTermin::create([
                'datum_i_vreme' => Carbon::now()->subDays(2)->setTime(20, 0),
                'tip' => 'snaga',
                'status' => 'završen',
                'clan_id' => $clan->id,
                'trener_id' => $clan->izabrani_trener_id,
            ]);

            if ($index % 2 === 0) {
                TreningTermin::create([
                    'datum_i_vreme' => Carbon::now()->addDays(3)->setTime(19, 0),
                    'tip' => 'grupni',
                    'status' => 'otkazan',
                    'clan_id' => $clan->id,
                    'trener_id' => $clan->izabrani_trener_id,
                ]);
            }
        }
    }
}
