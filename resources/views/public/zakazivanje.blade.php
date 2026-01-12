@extends('layouts.app')
@section('title','Zakazivanje treninga')

@section('content')
<div class="row g-3">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header bg-white">
                <strong>Zakazi trening</strong>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('termini.zakazi') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Član</label>
                        <select name="clan_id" class="form-select" required>
                            <option value="">-- izaberi --</option>
                            @foreach($clanovi as $c)
                                <option value="{{ $c->id }}">{{ $c->prezime }} {{ $c->ime }} ({{ $c->clanski_broj }})</option>
                            @endforeach
                        </select>
                        @error('clan_id') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trener</label>
                        <select name="trener_id" class="form-select" required>
                            <option value="">-- izaberi --</option>
                            @foreach($treneri as $t)
                                <option value="{{ $t->id }}">{{ $t->prezime }} {{ $t->ime }}</option>
                            @endforeach
                        </select>
                        @error('trener_id') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Datum i vreme</label>
                        <input type="datetime-local" name="datum_i_vreme" class="form-control" required>
                        @error('datum_i_vreme') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tip treninga</label>
                        <input type="text" name="tip" class="form-control" placeholder="npr. snaga, kardio, individualni" required>
                        @error('tip') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Zakazi</button>
                </form>

                <div class="mt-3 small text-muted">
                    Ako dobiješ grešku da termin nije dostupan, trener već ima zakazan termin u tom vremenu.
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <strong>Poslednjih 15 termina</strong>
                <a class="btn btn-outline-dark btn-sm" href="{{ route('trening-termins.index') }}">Admin termini</a>
            </div>

            <div class="table-responsive">
                <table class="table table-sm table-striped mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Član</th>
                            <th>Trener</th>
                            <th>Tip</th>
                            <th>Status</th>
                            <th class="text-end">Akcija</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($termini as $tt)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($tt->datum_i_vreme)->format('d.m.Y H:i') }}</td>
                                <td>{{ optional($tt->clan)->prezime }} {{ optional($tt->clan)->ime }}</td>
                                <td>{{ optional($tt->trener)->prezime }} {{ optional($tt->trener)->ime }}</td>
                                <td>{{ $tt->tip }}</td>
                                <td>
                                    <span class="badge text-bg-{{ $tt->status === 'zakazan' ? 'primary' : ($tt->status === 'otkazan' ? 'secondary' : 'success') }}">
                                        {{ $tt->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    @if($tt->status === 'zakazan')
                                        <form method="POST" action="{{ route('public.otkazi.form', $tt) }}" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger" type="submit">Otkaži</button>
                                        </form>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-muted py-4">Nema termina.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        <div class="mt-3">
            <a class="btn btn-outline-primary" href="{{ route('public.status.form') }}">Provera statusa članarine</a>
        </div>
    </div>
</div>
@endsection
