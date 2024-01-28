<?php

namespace App\Actions\DataEntry;

use App\Models\DataEntry;

class GetMeteoData
{
    public function handle():DataEntry|null
    {
        return DataEntry::query()->first();
    }
}
