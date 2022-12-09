<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VariantGroup extends Model
{
    use HasFactory;

    protected $fillable = ['variant_group_name', 'description'];

    protected $hidden = ['created_at', 'updated_at'];
    protected $table = 'variantgroup';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productvariants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
