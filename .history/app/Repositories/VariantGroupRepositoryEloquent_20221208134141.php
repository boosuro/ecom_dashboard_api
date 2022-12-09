<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VariantGroupRepository;
use App\Entities\VariantGroup;
use App\Validators\VariantGroupValidator;

/**
 * Class VariantGroupRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VariantGroupRepositoryEloquent extends BaseRepository implements VariantGroupRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VariantGroup::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
