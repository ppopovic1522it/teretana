<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clanarina;
use App\Models\Clan;
use Carbon\Carbon;

class ClanarinaSeeder extends Seeder
{
    public function run(): void
    {
        Clanarina::query()->delete();

        foreach (Clan::all() as $clan) {
            $statusUplate = match ($clan->status_clanarine) {
                'aktivna' => 'aktivna',
                'istekla' => 'istekla',
                default => 'uskoro ističe',
            };

            Clanarina::create([
                'iznos' => 3500,
                'datum_uplate' => Carbon::now()->subDays(rand(1, 20)),
                'trajanje' => 30,
                'status' => $statusUplate,
                'clan_id' => $clan->id,
            ]);
        }
    }
}
