<?php

namespace Epigra\Capsule\Repositories\Capsule;

use Epigra\Capsule\Models\Capsule;
use Epigra\Core\Repositories\Base\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface CapsuleRepositoryInterface extends BaseRepositoryInterface
{
    public function updateOrCreate(array $filter, array $data): Model;
}
