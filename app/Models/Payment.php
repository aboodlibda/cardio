<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    protected $guarded = [];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
