<?php

namespace Epigra\Capsule\Repositories\Capsule;

use Epigra\Capsule\Models\Capsule;
use Epigra\Core\Repositories\Base\BaseEloquentRepository;
use Illuminate\Database\Eloquent\Model;

class CapsuleRepository extends BaseEloquentRepository implements CapsuleRepositoryInterface
{
    /**
     * CapsuleRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(Capsule::class);
    }

    public function updateOrCreate(array $filter, array $data): Model
    {

        return $this->model::updateOrCreate($filter, $data);
    }
}
