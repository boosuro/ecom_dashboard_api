<?php

namespace App\Models;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VariantGroup extends Model
{
    use HasFactory;

    protected $fillable = ['variant_group_name', 'description'];

    protected $hidden = ['created_at', 'updated_at'];
    protected $table = 'variantgroup';

    public static $rules = [
        'variant_group_name' => 'required',
    ];

    public static $cast = [
        'variant_group_name' => 'string',
        'description' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'variant_group_id', 'id');
    }
}
