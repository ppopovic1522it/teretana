@extends('layouts.app')
@section('title','Novi trener')

@section('content')
<h1 class="h4 mb-3">Novi trener</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('treners.store') }}">
            @csrf
            @include('treners._form', ['trener' => null])
            <button class="btn btn-primary">Sačuvaj</button>
            <a class="btn btn-outline-dark" href="{{ route('treners.index') }}">Nazad</a>
        </form>
    </div>
</div>
@endsection
