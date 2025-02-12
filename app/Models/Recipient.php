<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipient extends Model
{
    protected $fillable = [
        'nome',
        'polo',
        'communication_id',
    ];

    public $timestamps = false;

    public function communication(): BelongsTo
    {
        return $this->belongsTo(Communication::class);
    }
}
