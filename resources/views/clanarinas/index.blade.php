@extends('layouts.app')
@section('title','Članarine')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Članarine (uplate)</h1>
    <a href="{{ route('clanarinas.create') }}" class="btn btn-primary">+ Nova uplata</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Član</th>
                    <th>Iznos</th>
                    <th>Datum uplate</th>
                    <th>Trajanje</th>
                    <th>Status</th>
                    <th class="text-end">Akcije</th>
                </tr>
            </thead>
            <tbody>
            @forelse($clanarinas as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ optional($u->clan)->prezime }} {{ optional($u->clan)->ime }}</td>
                    <td>{{ $u->iznos }}</td>
                    <td>{{ \Carbon\Carbon::parse($u->datum_uplate)->format('d.m.Y H:i') }}</td>
                    <td>{{ $u->trajanje }}</td>
                    <td>{{ $u->status }}</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('clanarinas.show',$u) }}">Prikaži</a>
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('clanarinas.edit',$u) }}">Izmeni</a>
                        <form class="d-inline" method="POST" action="{{ route('clanarinas.destroy',$u) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Obrisati uplatu?')">Obriši</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Nema uplata.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $clanarinas->links() }}
</div>
@endsection
