<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class CollectMeteoData
{
    /**
     * Collect meteo data from the API
     * @param string $latitude
     * @param string $longitude
     * @return array
     */
    public function handle(string $latitude , string $longitude): array
    {
        return Http::meteoApi()->get('', [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'hourly' => 'temperature_2m',
        ])->json();
    }
}
