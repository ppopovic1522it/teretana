@extends('layouts.app')
@section('title','Treneri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Treneri</h1>
    <a href="{{ route('treners.create') }}" class="btn btn-primary">+ Novi trener</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th class="text-end">Akcije</th>
                </tr>
            </thead>
            <tbody>
            @forelse($treners as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->ime }}</td>
                    <td>{{ $t->prezime }}</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('treners.show',$t) }}">Prikaži</a>
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('treners.edit',$t) }}">Izmeni</a>
                        <form class="d-inline" method="POST" action="{{ route('treners.destroy',$t) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Obrisati trenera?')">Obriši</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted py-4">Nema trenera.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $treners->links() }}
</div>
@endsection
