<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clan extends Model
{
    protected $guarded = [];

    public function izabraniTrener(): BelongsTo
    {
        return $this->belongsTo(Trener::class, 'izabrani_trener_id');
    }

    public function clanarine(): HasMany
    {
        return $this->hasMany(Clanarina::class);
    }

    public function termini(): HasMany
    {
        return $this->hasMany(TreningTermin::class);
    }
}
