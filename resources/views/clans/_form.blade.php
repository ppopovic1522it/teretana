

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Ime</label>
        <input name="ime" class="form-control" value="{{ old('ime', $clan->ime ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Prezime</label>
        <input name="prezime" class="form-control" value="{{ old('prezime', $clan->prezime ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Kontakt</label>
        <input name="kontakt" class="form-control" value="{{ old('kontakt', $clan->kontakt ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Članski broj</label>
        <input name="clanski_broj" class="form-control" value="{{ old('clanski_broj', $clan->clanski_broj ?? '') }}" required>
        <div class="form-text">Primer: CLN-0001</div>
    </div>

    <div class="col-md-6">
        <label class="form-label">Status članarine</label>
        <select name="status_clanarine" class="form-select" required>
            @php $val = old('status_clanarine', $clan->status_clanarine ?? 'aktivna'); @endphp
            @foreach(['aktivna','istekla','neplaćena'] as $s)
                <option value="{{ $s }}" @selected($val===$s)>{{ $s }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Izabrani trener</label>
        <select name="izabrani_trener_id" class="form-select">
            <option value="">-- bez trenera --</option>
            @foreach($treners as $t)
                <option value="{{ $t->id }}" @selected(old('izabrani_trener_id', $clan->izabrani_trener_id ?? null)==$t->id)>
                    {{ $t->prezime }} {{ $t->ime }}
                </option>
            @endforeach
        </select>
    </div>
</div>
