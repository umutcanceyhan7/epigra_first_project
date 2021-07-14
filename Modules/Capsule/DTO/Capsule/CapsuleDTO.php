<?php

namespace Epigra\Capsule\DTO\Capsule;

use Epigra\Core\DTO\Base\BaseDTO;

/**
 * Class CapsuleDTO
 */
class CapsuleDTO extends BaseDTO
{
    /**
     * CapsuleDTO constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        parent::__construct($parameters, self::class);
    }

    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $capsule_serial;

    /**
     * @var string
     */
    public string $capsule_id;

    /**
     * @var string
     */
    public string $status;

    /**
     * @var string|null
     */
    public ?string $original_launch;

    /**
     * @var int|null
     */
    public ?int $original_launch_unix;

    /**
     * @var string
     */
    public string $missions;

    /**
     * @var int
     */
    public int $landings;

    /**
     * @var string
     */
    public string $type;

    /**
     * @var string|null
     */
    public ?string $details;

    /**
     * @var int
     */
    public int $reuse_count;

    /**
     * @param $dto
     * @param array $originalData
     * @return CapsuleDTO
     */
    public function mapToDTO($dto, array $originalData): self
    {
        //you can make a change for each field on
        return $dto;
    }

    /**
     * @param array $parameters
     * @param bool $updateMode
     * @return array
     */
    public function validate(array $parameters, bool $updateMode)
    {
        return $this->validator($parameters, [
            'capsule_serial' => 'required',
            'capsule_id' => 'required',
            'status' => 'required',
            'landings' => 'required',
            'type' => 'required',
            'missions' => 'required',
            'reuse_count' => 'required',
            'original_launch' => 'nullable',
            'original_launch_unix' => 'nullable',
            'details' => 'nullable',
        ]);
    }
}
