<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipientLawyer extends Model
{
    protected $fillable = [
        'communication_id',
        'lawyer_id',
    ];

    public $timestamps = false;

    public function communication(): BelongsTo
    {
        return $this->belongsTo(Communication::class);
    }

    public function lawyer(): BelongsTo
    {
        return $this->belongsTo(Lawyer::class);
    }
}
