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

    protected $table = 'product_variants';

    public static $rules = [
        'variant_name' => 'required',
        'variant_group_id' => 'required',
    ];

    public static $cast = [
        'variant_name' => 'string',
        'variant_group_id' => 'integer',
    ];

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
    public function variantGroup()
    {
        return $this->belongsTo(VariantGroup::class, 'variant_group_id', 'id');
    }
}
