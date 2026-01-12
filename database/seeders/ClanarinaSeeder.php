<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clanarina;
use App\Models\Clan;

class ClanarinaSeeder extends Seeder
{
    public function run(): void
    {
        $clan = Clan::first();

        if (!$clan) {
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
