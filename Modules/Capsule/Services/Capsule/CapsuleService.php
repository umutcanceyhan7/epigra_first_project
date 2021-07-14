<?php

namespace Epigra\Capsule\Services\Capsule;

use Epigra\Capsule\DTO\Capsule\CapsuleDTO;
use Epigra\Capsule\Repositories\Capsule\CapsuleRepositoryInterface;
use Epigra\Capsule\Services\Capsule\CapsuleServiceInterface;
use Epigra\Core\DTO\Base\BaseDTO;
use Epigra\Core\Services\Base\BaseService;
use Epigra\SpaceX\Services\SpaceX\SpaceXService;

class CapsuleService extends BaseService implements CapsuleServiceInterface
{
    /**
     * @var CapsuleRepositoryInterface
     */
    private CapsuleRepositoryInterface $repository;

    /**
     * @var SpaceXService
     */
    private SpaceXService $spaceXService;


    /**
     * CapsuleService constructor.
     * @param CapsuleRepositoryInterface $repository
     * @param SpaceXService $spaceXService
     */
    public function __construct(CapsuleRepositoryInterface $repository, SpaceXService $spaceXService)
    {
        parent::__construct($repository, CapsuleDTO::class);
        $this->repository = $repository;
        $this->spaceXService = $spaceXService;
    }

    /**
     * @return array $capsules
     */
    public function getAllCapsules(): array
    {
        $capsules = $this->spaceXService->getCapsules();

        return $capsules;
    }

    /**
     * Capsules array
     * @param array $capsules
     * It turns array to json and turns it to CapsuleDTO
     * Sent repository the created CapsuleDTO as filter and model.
     */
    public function syncCapsules(array $capsules)
    {
        foreach ($capsules as $capsule) {

            # Array to json
            $capsule['missions'] = json_encode($capsule['missions']);

            $dto = new CapsuleDTO($capsule);

            $this->updateOrCreate($capsule, $dto);
        }
    }

    public function updateOrCreate(array $capsule, BaseDTO $dto): BaseDTO
    {
        $model = $this->repository->updateOrCreate(['capsule_serial' => $capsule['capsule_serial']], $dto->toModel());

        return new CapsuleDTO($model->toArray());
    }
}
