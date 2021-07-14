<?php

namespace Epigra\Capsule\Services\Capsule;

use Epigra\Capsule\Models\Capsule;
use Epigra\Core\Services\Base\BaseServiceInterface;

/**
 * Interface CapsuleServiceInterface
 * @package Epigra\Capsule\Services\Capsule\Capsule
 */
interface CapsuleServiceInterface extends BaseServiceInterface
{
    public function getAllCapsules(): array;
    public function syncCapsules(array $data);
}
