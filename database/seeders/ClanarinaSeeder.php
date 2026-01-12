<?php

namespace Database\Seeders;

use App\Models\Clan;
use App\Models\Clanarina;
use Illuminate\Database\Seeder;

class ClanarinaSeeder extends Seeder
{
    public function run(): void
    {
        $clan = Clan::first();

        if (! $clan) {
            return; // ako nema clanova, preskoci
        }

        Clanarina::create([
            'clan_id' => $clan->id,
            'iznos' => 3000,
            'datum_uplate' => now(),
            'trajanje' => 30,
            'status' => 'aktivna',
        ]);
    }
}
