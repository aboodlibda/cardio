<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $guarded = [];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
