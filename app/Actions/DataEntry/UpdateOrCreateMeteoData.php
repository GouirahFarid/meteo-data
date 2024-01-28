<?php

namespace App\Actions\DataEntry;

use App\Models\DataEntry;

/**
 * UpdateOrCreateMeteoData Action: Update or create meteo data
 */
class UpdateOrCreateMeteoData
{
    /**
     * Update or create meteo data
     * @param array $dateEntry
     * @return DataEntry
     */
    public function handle(array $dateEntry): DataEntry
    {
        $dataEntry = DataEntry::query()->firstOrNew();
        $dataEntry->data = $dateEntry;
        $dataEntry->save();

        return $dataEntry->refresh();
    }
}
