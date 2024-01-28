<?php

namespace App\Actions\DataEntry;

use App\Models\DataEntry;

/**
 * GetMeteoData Action: Get meteo data
 *
 */
class GetMeteoData
{
    /**
     * Get meteo data
     * @return DataEntry|null
     */
    public function handle():DataEntry|null
    {
        return DataEntry::query()->first();
    }
}
