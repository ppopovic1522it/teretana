<?php

namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\Trener;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClanController extends Controller
{
    public function index()
    {
        $clans = Clan::with('trener')
            ->orderBy('prezime')
            ->paginate(10);

        return view('clans.index', compact('clans'));
    }

    public function create()
    {
        $treners = Trener::orderBy('prezime')->get();

        return view('clans.create', compact('treners'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ime' => ['required', 'string', 'max:255'],
            'prezime' => ['required', 'string', 'max:255'],
            'kontakt' => ['required', 'string', 'max:255'],
            'clanski_broj' => ['required', 'string', 'max:255', 'unique:clans,clanski_broj'],
            'status_clanarine' => ['required', 'string', 'max:255'],
            'izabrani_trener_id' => ['nullable', 'integer', 'exists:treners,id'],
        ]);

        Clan::create($data);

        return redirect()
            ->route('clans.index')
            ->with('success', 'Član je uspešno dodat.');
    }

    public function show(Clan $clan)
    {
        $clan->load('trener');

        return view('clans.show', compact('clan'));
    }

    public function edit(Clan $clan)
    {
        $treners = Trener::orderBy('prezime')->get();

        return view('clans.edit', compact('clan', 'treners'));
    }

    public function update(Request $request, Clan $clan)
    {
        $data = $request->validate([
            'ime' => ['required', 'string', 'max:255'],
            'prezime' => ['required', 'string', 'max:255'],
            'kontakt' => ['required', 'string', 'max:255'],
            'clanski_broj' => [
                'required',
                'string',
                'max:255',
                Rule::unique('clans', 'clanski_broj')->ignore($clan->id),
            ],
            'status_clanarine' => ['required', 'string', 'max:255'],
            'izabrani_trener_id' => ['nullable', 'integer', 'exists:treners,id'],
        ]);

        $clan->update($data);

        return redirect()
            ->route('clans.index')
            ->with('success', 'Član je uspešno izmenjen.');
    }

    public function destroy(Clan $clan)
    {
        $clan->delete();

        return redirect()
            ->route('clans.index')
            ->with('success', 'Član je obrisan.');
    }
}
