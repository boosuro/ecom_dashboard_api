<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductVariantRepository;
use App\Entities\ProductVariant;
use App\Validators\ProductVariantValidator;

/**
 * Class ProductVariantRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductVariantRepositoryEloquent extends BaseRepository implements ProductVariantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductVariant::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
