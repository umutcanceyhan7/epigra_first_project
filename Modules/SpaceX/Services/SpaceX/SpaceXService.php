<?php

namespace Epigra\SpaceX\Services\SpaceX;

use Epigra\SpaceX\DTO\SpaceX\SpaceXDTO;
use Epigra\SpaceX\Services\SpaceX\SpaceXServiceInterface;
use Illuminate\Support\Facades\Http;

class SpaceXService implements SpaceXServiceInterface
{
    public function getCapsules(): array
    {
        $url = 'https://api.spacexdata.com/v3/capsules';

        # fetch data from api using HTTP::get request
        $rawData = Http::get($url);

        $decodedData = json_decode($rawData, true);

        return $decodedData;
    }
}
