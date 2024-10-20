<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lawyer extends Model
{
    protected $fillable = [
        'nome',
        'numero_oab',
        'uf_oab',
        'communication_id',
    ];

    public $timestamps = false;

    public function communications(): BelongsToMany
    {
        return $this->belongsToMany(Communication::class, 'recipient_lawyers');
    }
}
