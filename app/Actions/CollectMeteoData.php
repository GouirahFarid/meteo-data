<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class CollectMeteoData
{
    public function handle(string $latitude , string $longitude)
    {
        return Http::meteoApi()->get('', [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'hourly' => 'temperature_2m',
        ])->json();
    }
}
