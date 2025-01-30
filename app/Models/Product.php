<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    protected $guarded = [];
    use HasTranslations;
    protected $translatable  = ['name'   ,'description'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_products','product_id','category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id');
    }


    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes', 'product_id', 'attribute_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function coupons(): BelongsToMany
    {
        return $this->belongsToMany(Coupon::class,'coupon_products','product_id','coupon_id');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);

    }
}
