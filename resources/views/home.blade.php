@extends('layouts.app')

@section('title', 'Početna')

@section('content')
<div class="row g-3">
    <div class="col-12">
        <div class="p-4 bg-white border rounded">
            <h1 class="h3 mb-2">Teretana (FitZone) – Admin panel</h1>
            <p class="text-muted mb-0">Brz pristup CRUD ekranima i use-case funkcionalnostima.</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Treneri</h5>
                <p class="card-text text-muted">CRUD upravljanje trenerima.</p>
                <a class="btn btn-dark w-100" href="{{ route('treners.index') }}">Otvori</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Članovi</h5>
                <p class="card-text text-muted">CRUD upravljanje članovima.</p>
                <a class="btn btn-dark w-100" href="{{ route('clans.index') }}">Otvori</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Članarine</h5>
                <p class="card-text text-muted">Evidencija uplata.</p>
                <a class="btn btn-dark w-100" href="{{ route('clanarinas.index') }}">Otvori</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Zakazivanje</h5>
                <p class="card-text text-muted">Use-case: zakazi/otkazi.</p>
                <a class="btn btn-primary w-100" href="{{ route('public.zakazi.form') }}">Otvori</a>
            </div>
        </div>
    </div>
</div>
@endsection
