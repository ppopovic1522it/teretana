<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trener;

class TrenerSeeder extends Seeder
{
    public function run(): void
    {
        Trener::query()->delete();

        Trener::create(['ime' => 'Marko', 'prezime' => 'Janković']);
        Trener::create(['ime' => 'Ana', 'prezime' => 'Nikolić']);
        Trener::create(['ime' => 'Nemanja', 'prezime' => 'Stojanović']);
    }
}
