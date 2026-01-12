@extends('layouts.app')
@section('title','Status članarine')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <strong>Status članarine</strong>
    </div>
    <div class="card-body">
        <p class="mb-1"><strong>Član:</strong> {{ $clan->prezime }} {{ $clan->ime }}</p>
        <p class="mb-1"><strong>Članski broj:</strong> {{ $clan->clanski_broj }}</p>
        <p class="mb-3"><strong>Status:</strong>
            <span class="badge text-bg-{{ $clan->status_clanarine === 'aktivna' ? 'success' : ($clan->status_clanarine === 'istekla' ? 'secondary' : 'danger') }}">
                {{ $clan->status_clanarine }}
            </span>
        </p>

        <a class="btn btn-outline-dark" href="{{ route('public.status.form') }}">Nazad</a>
        <a class="btn btn-primary" href="{{ route('public.zakazi.form') }}">Zakazivanje</a>
    </div>
</div>
@endsection
