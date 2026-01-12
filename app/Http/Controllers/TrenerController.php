<?php

namespace App\Http\Controllers;

use App\Models\Trener;
use Illuminate\Http\Request;

class TrenerController extends Controller
{
    public function index()
    {
        $treners = Trener::orderBy('prezime')->paginate(10);
        return view('treners.index', compact('treners'));
    }

    public function create()
    {
        return view('treners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ime' => ['required', 'string', 'max:255'],
            'prezime' => ['required', 'string', 'max:255'],
        ]);

        Trener::create($data);

        return redirect()
            ->route('treners.index')
            ->with('success', 'Trener je uspešno dodat.');
    }

    public function show(Trener $trener)
    {
        return view('treners.show', compact('trener'));
    }

    public function edit(Trener $trener)
    {
        return view('treners.edit', compact('trener'));
    }

    public function update(Request $request, Trener $trener)
    {
        $data = $request->validate([
            'ime' => ['required', 'string', 'max:255'],
            'prezime' => ['required', 'string', 'max:255'],
        ]);

        $trener->update($data);

        return redirect()
            ->route('treners.index')
            ->with('success', 'Trener je uspešno izmenjen.');
    }

    public function destroy(Trener $trener)
    {
        $trener->delete();

        return redirect()
            ->route('treners.index')
            ->with('success', 'Trener je obrisan.');
    }
}
