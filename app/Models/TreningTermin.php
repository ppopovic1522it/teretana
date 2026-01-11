<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TreningTermin extends Model
{
    protected $guarded = [];

    protected $casts = [
        'datum_i_vreme' => 'datetime',
    ];

    public function clan(): BelongsTo
    {
        return $this->belongsTo(Clan::class);
    }

    public function trener(): BelongsTo
    {
        return $this->belongsTo(Trener::class);
    }
}
