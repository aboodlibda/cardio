<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Coupon extends Model
{
    use HasTranslations;
    protected $translatable = ['description'];

    protected $guarded = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'coupon_products','coupon_id','product_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
