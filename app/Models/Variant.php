<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variant extends Model
{
    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function variant_values(): HasMany
    {
        return $this->hasMany(VariantValues::class);
    }
}
