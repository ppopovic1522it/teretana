@extends('layouts.app')
@section('title','Član')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Član #{{ $clan->id }}</h1>
    <div>
        <a class="btn btn-outline-primary" href="{{ route('clans.edit',$clan) }}">Izmeni</a>
        <a class="btn btn-outline-dark" href="{{ route('clans.index') }}">Nazad</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <p class="mb-1"><strong>Ime:</strong> {{ $clan->ime }}</p>
        <p class="mb-1"><strong>Prezime:</strong> {{ $clan->prezime }}</p>
        <p class="mb-1"><strong>Kontakt:</strong> {{ $clan->kontakt }}</p>
        <p class="mb-1"><strong>Članski broj:</strong> {{ $clan->clanski_broj }}</p>
        <p class="mb-1"><strong>Status:</strong> {{ $clan->status_clanarine }}</p>
        <p class="mb-0"><strong>Trener:</strong> {{ optional($clan->trener)->prezime }} {{ optional($clan->trener)->ime }}</p>
    </div>
</div>
@endsection
