<?php

namespace App\Repositories;

use App\Models\ProductVariant;
use App\Repositories\CustomBaseRepository;
use App\Validators\ProductVariantValidator;
use App\Repositories\ProductVariantRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ProductVariantRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductVariantRepositoryEloquent extends CustomBaseRepository implements ProductVariantRepository
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

    /**
     * Helper to create variant groups and variants under them
     */
    public function groupedByVariantGroups()
    {
        $products = [];
        foreach ($this->all() as $model) {
            if (!empty($model->variantGroup)) {
                $products[$model->variantGroup->variant_group_name][$model->id] = $model->variant_name;
            }
        }
        return $products;
    }
}
