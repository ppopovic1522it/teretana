@extends('layouts.app')
@section('title','Članovi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Članovi</h1>
    <a href="{{ route('clans.create') }}" class="btn btn-primary">+ Novi član</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Kontakt</th>
                    <th>Članski broj</th>
                    <th>Status</th>
                    <th>Trener</th>
                    <th class="text-end">Akcije</th>
                </tr>
            </thead>
            <tbody>
            @forelse($clans as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->ime }}</td>
                    <td>{{ $c->prezime }}</td>
                    <td>{{ $c->kontakt }}</td>
                    <td>{{ $c->clanski_broj }}</td>
                    <td>{{ $c->status_clanarine }}</td>
                    <td>{{ optional($c->trener)->prezime }} {{ optional($c->trener)->ime }}</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('clans.show',$c) }}">Prikaži</a>
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('clans.edit',$c) }}">Izmeni</a>
                        <form class="d-inline" method="POST" action="{{ route('clans.destroy',$c) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Obrisati člana?')">Obriši</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center text-muted py-4">Nema članova.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $clans->links() }}
</div>
@endsection
