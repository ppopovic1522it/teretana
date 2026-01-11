<?php

namespace Tests\Feature;

use App\Models\Clan;
use App\Models\Trener;
use App\Models\TreningTermin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ZakazivanjeTerminaTest extends TestCase
{
    use RefreshDatabase;

    public function test_zakazivanje_treninga_uspesno_kreira_termin(): void
    {
        $trener = Trener::create(['ime' => 'Test', 'prezime' => 'Trener']);
        $clan = Clan::create([
            'ime' => 'Test',
            'prezime' => 'Clan',
            'kontakt' => 'test@example.com',
            'clanski_broj' => 'CLN-TEST-1',
            'izabrani_trener_id' => $trener->id,
            'status_clanarine' => 'aktivna',
        ]);

        $payload = [
            'clan_id' => $clan->id,
            'trener_id' => $trener->id,
            'datum_i_vreme' => now()->addDay()->setTime(18, 0)->toDateTimeString(),
            'tip' => 'individualni',
        ];

        $response = $this->postJson(route('termini.zakazi'), $payload);

        $response->assertStatus(201);

        $this->assertDatabaseHas('trening_termins', [
            'clan_id' => $clan->id,
            'trener_id' => $trener->id,
            'tip' => 'individualni',
            'status' => 'zakazan',
        ]);
    }

    public function test_ne_moze_dupli_termin_za_istog_trenera_u_isto_vreme(): void
    {
        $trener = Trener::create(['ime' => 'Test', 'prezime' => 'Trener']);

        $clan1 = Clan::create([
            'ime' => 'Test1',
            'prezime' => 'Clan1',
            'kontakt' => 't1@example.com',
            'clanski_broj' => 'CLN-TEST-2',
            'izabrani_trener_id' => $trener->id,
            'status_clanarine' => 'aktivna',
        ]);

        $clan2 = Clan::create([
            'ime' => 'Test2',
            'prezime' => 'Clan2',
            'kontakt' => 't2@example.com',
            'clanski_broj' => 'CLN-TEST-3',
            'izabrani_trener_id' => $trener->id,
            'status_clanarine' => 'aktivna',
        ]);

        $datum = now()->addDays(2)->setTime(19, 0)->toDateTimeString();

        TreningTermin::create([
            'clan_id' => $clan1->id,
            'trener_id' => $trener->id,
            'datum_i_vreme' => $datum,
            'tip' => 'snaga',
            'status' => 'zakazan',
        ]);

        $payload = [
            'clan_id' => $clan2->id,
            'trener_id' => $trener->id,
            'datum_i_vreme' => $datum,
            'tip' => 'kardio',
        ];

        $response = $this->postJson(route('termini.zakazi'), $payload);

        $response->assertStatus(422);
        $response->assertJsonFragment([
            'poruka' => 'Termin nije dostupan (trener je zauzet u tom terminu).',
        ]);
    }
}
