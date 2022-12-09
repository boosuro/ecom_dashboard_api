<?php

namespace App\Repositories;

use Exception;
use App\Models\VariantGroup;
use App\Validators\VariantGroupValidator;
use App\Repositories\VariantGroupRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

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

    /**
     * Find table rows data
     *
     * @param $id
     * @param $columns
     * @return mixed
     */
    public function findWithoutFail($id, $columns = ['*'])
    {
        try {
            return $this->find($id, $columns);
        } catch (Exception $e) {
            return;
        }
    }
}
