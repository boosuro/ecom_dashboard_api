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
        'quantity' => 'quantity'
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
    public function productvariants()
    {
        return $this->belongsToMany(ProductVariant::class, 'product_productvariant');
    }

    /**
     * Function to get media url else return the default image
     * 
     * @param string $collectionName
     *  @param string $conversion
     * @return string url
     */
    public function getFirstMediaUrl($collectionName = 'default')
    {
        $url = $this->getFirstMediaUrlTrait($collectionName);
        $array = explode('.', $url);
        $extension = strtolower(end($array));
        if (in_array($extension, config('medialibrary.extensions_has_thumb'))) {
            return asset($this->getFirstMediaUrlTrait($collectionName));
        } else {
            return asset(config('medialibrary.icons_folder') . '/' . $extension . '.png');
        }
    }
}
