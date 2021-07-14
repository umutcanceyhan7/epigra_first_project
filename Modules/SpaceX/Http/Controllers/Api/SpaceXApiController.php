<?php

namespace Epigra\SpaceX\Http\Controllers\Api;

use Epigra\Core\Controller\BaseApiController;
use Epigra\SpaceX\DTO\SpaceX\SpaceXDTO;
use Epigra\SpaceX\Services\SpaceX\SpaceXServiceInterface;

class SpaceXApiController extends BaseApiController
{
    public function __construct(SpaceXServiceInterface $service)
    {
        $this->service = $service;
        $this->dtoClass = SpaceXDTO::class;
    }
}
