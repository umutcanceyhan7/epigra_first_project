<?php

namespace Epigra\SpaceX\Services\SpaceX;

use Epigra\SpaceX\Models\SpaceX;
use Epigra\Core\Services\Base\BaseServiceInterface;

/**
 * Interface SpaceXServiceInterface
 * @package Epigra\SpaceX\Services\SpaceX\SpaceX
 */
interface SpaceXServiceInterface
{
    public function getCapsules(): array;
}
