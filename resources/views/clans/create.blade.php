@extends('layouts.app')
@section('title','Novi član')

@section('content')
<h1 class="h4 mb-3">Novi član</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('clans.store') }}">
            @csrf
            @include('clans._form', ['clan' => null])
            <div class="mt-3">
                <button class="btn btn-primary">Sačuvaj</button>
                <a class="btn btn-outline-dark" href="{{ route('clans.index') }}">Nazad</a>
            </div>
        </form>
    </div>
</div>
@endsection
