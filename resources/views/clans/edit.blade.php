@extends('layouts.app')
@section('title','Izmena člana')

@section('content')
<h1 class="h4 mb-3">Izmena člana</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('clans.update',$clan) }}">
            @csrf @method('PUT')
            @include('clans._form', ['clan' => $clan])
            <div class="mt-3">
                <button class="btn btn-primary">Sačuvaj</button>
                <a class="btn btn-outline-dark" href="{{ route('clans.index') }}">Nazad</a>
            </div>
        </form>
    </div>
</div>
@endsection
