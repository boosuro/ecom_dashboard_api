<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProductVariant;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'price', 'quantity', 'user_id'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $table = 'products';

    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'quantity' => 'required'
    ];

    public static $cast = [
        'name' => 'string',
        'price' => 'float',
        'quantity' => 'integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function variants()
    {
        return $this->belongsToMany(ProductVariant::class, 'product_productvariant', 'product_id', 'product_variant_id')->withTimeStamps();
    }
}
