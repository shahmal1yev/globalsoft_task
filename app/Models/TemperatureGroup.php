<?php

namespace App\Models;

use App\Models\Temperature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemperatureGroup extends Model
{
    use HasFactory;

    public function temperatures(): HasMany
    {
        return $this->hasMany(Temperature::class);
    }
}
