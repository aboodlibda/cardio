<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    protected $guarded = [];

    use HasTranslations;
     protected  $translatable = ['name','description'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
