<?php

namespace App\Actions\DataEntry;

use App\Models\DataEntry;

class UpdateOrCreateMeteoData
{
    public function handle(array $dateEntry): DataEntry
    {
        $dataEntry = DataEntry::query()->firstOrNew();
        $dataEntry->data = $dateEntry;
        $dataEntry->save();

        return $dataEntry->refresh();
    }
}
