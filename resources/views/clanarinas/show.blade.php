@extends('layouts.app')
@section('title','Uplata')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Uplata #{{ $clanarina->id }}</h1>
    <div>
        <a class="btn btn-outline-primary" href="{{ route('clanarinas.edit',$clanarina) }}">Izmeni</a>
        <a class="btn btn-outline-dark" href="{{ route('clanarinas.index') }}">Nazad</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <p class="mb-1"><strong>Član:</strong> {{ optional($clanarina->clan)->prezime }} {{ optional($clanarina->clan)->ime }}</p>
        <p class="mb-1"><strong>Iznos:</strong> {{ $clanarina->iznos }}</p>
        <p class="mb-1"><strong>Datum uplate:</strong> {{ \Carbon\Carbon::parse($clanarina->datum_uplate)->format('d.m.Y H:i') }}</p>
        <p class="mb-1"><strong>Trajanje:</strong> {{ $clanarina->trajanje }}</p>
        <p class="mb-0"><strong>Status:</strong> {{ $clanarina->status }}</p>
    </div>
</div>
@endsection
