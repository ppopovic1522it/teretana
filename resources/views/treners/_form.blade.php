

<div class="mb-3">
    <label class="form-label">Ime</label>
    <input name="ime" class="form-control" value="{{ old('ime', $trener->ime ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Prezime</label>
    <input name="prezime" class="form-control" value="{{ old('prezime', $trener->prezime ?? '') }}" required>
</div>
