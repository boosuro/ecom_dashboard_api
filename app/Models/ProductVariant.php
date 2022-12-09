<?php

namespace App\Models;

use App\Models\Product;
use App\Models\VariantGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['variant_name', 'variant_group_id'];

    protected $hidden = ['created_at', 'updated_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_productvariant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function variantgroup()
    {
        return $this->belongsTo(VariantGroup::class);
    }
}
