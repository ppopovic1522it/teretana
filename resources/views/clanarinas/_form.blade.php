

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Član</label>
        <select name="clan_id" class="form-select" required>
            <option value="">-- izaberi --</option>
            @foreach($clans as $c)
                <option value="{{ $c->id }}" @selected(old('clan_id', $clanarina->clan_id ?? null)==$c->id)>
                    {{ $c->prezime }} {{ $c->ime }} ({{ $c->clanski_broj }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Iznos</label>
        <input type="number" name="iznos" class="form-control" value="{{ old('iznos', $clanarina->iznos ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Datum uplate</label>
        <input type="datetime-local" name="datum_uplate" class="form-control"
               value="{{ old('datum_uplate', isset($clanarina) && $clanarina->datum_uplate ? \Carbon\Carbon::parse($clanarina->datum_uplate)->format('Y-m-d\TH:i') : '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Trajanje</label>
        <input type="number" name="trajanje" class="form-control" value="{{ old('trajanje', $clanarina->trajanje ?? '') }}" required>
        <div class="form-text">npr. 30 (dana) ili 1 (mesec) – kako si definisao u projektu</div>
    </div>

    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            @php $val = old('status', $clanarina->status ?? 'aktivna'); @endphp
            @foreach(['aktivna','uskoro ističe','istekla'] as $s)
                <option value="{{ $s }}" @selected($val===$s)>{{ $s }}</option>
            @endforeach
        </select>
    </div>
</div>
