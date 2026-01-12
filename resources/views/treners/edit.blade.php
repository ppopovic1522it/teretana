@extends('layouts.app')
@section('title','Izmena trenera')

@section('content')
<h1 class="h4 mb-3">Izmena trenera</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('treners.update',$trener) }}">
            @csrf @method('PUT')
            @include('treners._form', ['trener' => $trener])
            <button class="btn btn-primary">Sačuvaj</button>
            <a class="btn btn-outline-dark" href="{{ route('treners.index') }}">Nazad</a>
        </form>
    </div>
</div>
@endsection
