<?php

namespace App\Models;

use App\Models\TemperatureGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Temperature extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree',
        'temperature_group_id'
    ];

    public function temperature_group(): BelongsTo
    {
        return $this->belongsTo(TemperatureGroup::class);
    }
}
