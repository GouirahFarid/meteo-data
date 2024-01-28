<?php

namespace App\Services;

use App\Actions\CollectMeteoData;
use App\Actions\DataEntry\GetMeteoData;
use App\Actions\DataEntry\UpdateOrCreateMeteoData;
use App\Models\DataEntry;
use Illuminate\Support\Arr;

class MeteoService
{
    /**
     * @param string $latitude
     * @param string $longitude
     * @return DataEntry|void
     */
    public function collect(string $latitude = '28.50', string $longitude = '10.00')
    {
        $collectMeteoData = (new CollectMeteoData())->handle($latitude, $longitude);
        if (is_array($collectMeteoData) && isset($collectMeteoData['hourly'])) {
            $data=$this->cleanData($collectMeteoData);
            return (new UpdateOrCreateMeteoData())->handle($data);
        }
    }

    /**
     * @return DataEntry|null
     */
    public function get(): ?DataEntry
    {
        return (new GetMeteoData())->handle();
    }

    /**
     * @param array $data
     * @return DataEntry
     */
    public function update(array $data): DataEntry
    {
        return (new UpdateOrCreateMeteoData())->handle($data);
    }

    /**
     * @param $collectedData
     * @return array
     */
    private function cleanData($collectedData): array
    {
        return [
            'hourly_units'=>$collectedData['hourly_units'],
            'hourly_data'=>Arr::map($collectedData['hourly']['time'],function ($item,$key) use ($collectedData) {
                return [
                    'time'=>$item,
                    'temperature_2m'=>$collectedData['hourly']['temperature_2m'][$key],
                ];
            }),
            'latitude'=>$collectedData['latitude'],
            'longitude'=>$collectedData['longitude'],
        ];
    }
}
