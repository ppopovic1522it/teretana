<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trener extends Model
{
    protected $guarded = [];

    public function clanovi(): HasMany
    {
        return $this->hasMany(Clan::class, 'izabrani_trener_id');
    }

    public function termini(): HasMany
    {
        return $this->hasMany(TreningTermin::class);
    }
}
