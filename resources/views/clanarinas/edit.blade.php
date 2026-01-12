@extends('layouts.app')
@section('title','Izmena uplate')

@section('content')
<h1 class="h4 mb-3">Izmena uplate</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('clanarinas.update',$clanarina) }}">
            @csrf @method('PUT')
            @include('clanarinas._form', ['clanarina' => $clanarina])
            <div class="mt-3">
                <button class="btn btn-primary">Sačuvaj</button>
                <a class="btn btn-outline-dark" href="{{ route('clanarinas.index') }}">Nazad</a>
            </div>
        </form>
    </div>
</div>
@endsection
