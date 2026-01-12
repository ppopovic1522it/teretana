@extends('layouts.app')
@section('title','Status članarine')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <strong>Provera statusa članarine</strong>
    </div>
    <div class="card-body">
        <form method="GET" action="" onsubmit="event.preventDefault(); window.location.href = '/status-clanarine/' + document.getElementById('clan_id').value;">
            <div class="row g-2 align-items-end">
                <div class="col-md-8">
                    <label class="form-label">Izaberi člana</label>
                    <select id="clan_id" class="form-select" required>
                        <option value="">-- izaberi --</option>
                        @foreach($clanovi as $c)
                            <option value="{{ $c->id }}">{{ $c->prezime }} {{ $c->ime }} ({{ $c->clanski_broj }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary w-100" type="submit">Prikaži</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
