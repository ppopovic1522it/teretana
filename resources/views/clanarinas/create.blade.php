@extends('layouts.app')
@section('title','Nova uplata')

@section('content')
<h1 class="h4 mb-3">Nova uplata</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('clanarinas.store') }}">
            @csrf
            @include('clanarinas._form', ['clanarina' => null])
            <div class="mt-3">
                <button class="btn btn-primary">Sačuvaj</button>
                <a class="btn btn-outline-dark" href="{{ route('clanarinas.index') }}">Nazad</a>
            </div>
        </form>
    </div>
</div>
@endsection
