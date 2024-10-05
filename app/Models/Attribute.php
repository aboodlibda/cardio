<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    protected $guarded = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function attribute_values(): HasMany
    {
        return $this->hasMany(AttributeValues::class);
    }
}
