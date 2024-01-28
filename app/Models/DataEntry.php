<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEntry extends Model
{
    use HasFactory;

    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ( $value) => json_decode($value),
            set: fn ( $value) => json_encode($value),
        );
    }
}
