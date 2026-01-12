@extends('layouts.app')
@section('title','Trener')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Trener #{{ $trener->id }}</h1>
    <div>
        <a class="btn btn-outline-primary" href="{{ route('treners.edit',$trener) }}">Izmeni</a>
        <a class="btn btn-outline-dark" href="{{ route('treners.index') }}">Nazad</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <p class="mb-1"><strong>Ime:</strong> {{ $trener->ime }}</p>
        <p class="mb-0"><strong>Prezime:</strong> {{ $trener->prezime }}</p>
    </div>
</div>
@endsection
