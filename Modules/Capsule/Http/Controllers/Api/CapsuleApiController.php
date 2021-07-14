<?php

namespace Epigra\Capsule\Http\Controllers\Api;

use Epigra\Core\Controller\BaseApiController;
use Epigra\Capsule\DTO\Capsule\CapsuleDTO;
use Epigra\Capsule\Services\Capsule\CapsuleServiceInterface;

class CapsuleApiController extends BaseApiController
{
    public function __construct(CapsuleServiceInterface $service)
    {
        $this->service = $service;
        $this->dtoClass = CapsuleDTO::class;
    }
}
