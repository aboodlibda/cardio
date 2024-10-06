<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $guarded = [];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }


    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
