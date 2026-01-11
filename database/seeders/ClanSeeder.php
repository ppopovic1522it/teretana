<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clan;
use App\Models\Trener;

class ClanSeeder extends Seeder
{
    public function run(): void
    {
        Clan::query()->delete();

        $trener1 = Trener::query()->first();
        $trener2 = Trener::query()->skip(1)->first() ?? $trener1;

        if (!$trener1) {
            return;
        }

        Clan::create([
            'ime' => 'Milan',
            'prezime' => 'Petrović',
            'kontakt' => 'milan.petrovic@example.com',
            'clanski_broj' => 'CLN-0001',
            'izabrani_trener_id' => $trener1->id,
            'status_clanarine' => 'aktivna',
        ]);

        Clan::create([
            'ime' => 'Jovana',
            'prezime' => 'Ilić',
            'kontakt' => 'jovana.ilic@example.com',
            'clanski_broj' => 'CLN-0002',
            'izabrani_trener_id' => $trener2->id,
            'status_clanarine' => 'aktivna',
        ]);

        Clan::create([
            'ime' => 'Petar',
            'prezime' => 'Marković',
            'kontakt' => '+38160111222',
            'clanski_broj' => 'CLN-0003',
            'izabrani_trener_id' => $trener1->id,
            'status_clanarine' => 'istekla',
        ]);

        Clan::create([
            'ime' => 'Ivana',
            'prezime' => 'Kostić',
            'kontakt' => '+38164123456',
            'clanski_broj' => 'CLN-0004',
            'izabrani_trener_id' => $trener2->id,
            'status_clanarine' => 'neplaćena',
        ]);
    }
}
