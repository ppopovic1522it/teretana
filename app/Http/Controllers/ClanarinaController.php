<?php

namespace App\Http\Controllers;

use App\Models\Clanarina;
use App\Models\Clan;
use Illuminate\Http\Request;

class ClanarinaController extends Controller
{
    public function index()
    {
        $clanarinas = Clanarina::with('clan')
            ->orderByDesc('datum_uplate')
            ->paginate(10);

        return view('clanarinas.index', compact('clanarinas'));
    }

    public function create()
    {
        $clans = Clan::orderBy('prezime')->orderBy('ime')->get();

        return view('clanarinas.create', compact('clans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'clan_id' => ['required', 'integer', 'exists:clans,id'],
            'iznos' => ['required', 'integer', 'min:0'],
            'datum_uplate' => ['required', 'date'],
            'trajanje' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        Clanarina::create($data);

        return redirect()
            ->route('clanarinas.index')
            ->with('success', 'Članarina je uspešno dodata.');
    }

    public function show(Clanarina $clanarina)
    {
        $clanarina->load('clan');

        return view('clanarinas.show', compact('clanarina'));
    }

    public function edit(Clanarina $clanarina)
    {
        $clans = Clan::orderBy('prezime')->orderBy('ime')->get();

        return view('clanarinas.edit', compact('clanarina', 'clans'));
    }

    public function update(Request $request, Clanarina $clanarina)
    {
        $data = $request->validate([
            'clan_id' => ['required', 'integer', 'exists:clans,id'],
            'iznos' => ['required', 'integer', 'min:0'],
            'datum_uplate' => ['required', 'date'],
            'trajanje' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        $clanarina->update($data);

        return redirect()
            ->route('clanarinas.index')
            ->with('success', 'Članarina je uspešno izmenjena.');
    }

    public function destroy(Clanarina $clanarina)
    {
        $clanarina->delete();

        return redirect()
            ->route('clanarinas.index')
            ->with('success', 'Članarina je obrisana.');
    }
}
