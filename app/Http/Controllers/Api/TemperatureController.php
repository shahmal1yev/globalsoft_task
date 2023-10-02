<?php

namespace App\Http\Controllers\Api;

use App\Models\Temperature;
use App\Models\TemperatureGroup;
use App\Http\Controllers\Controller;
use App\Http\Traits\TemperatureTrait;
use App\Http\Requests\StoreTemperatureRequest;
use App\Http\Resources\Api\TemperatureResource;
use Illuminate\Support\Collection;

class TemperatureController extends Controller
{
    use TemperatureTrait;

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTemperatureRequest $request)
    {
        $group = TemperatureGroup::create();

        $temperatures = collect($request->temperatures)->map(function ($temperature) use ($group) {
            return [
                'degree' => $temperature,
                'temperature_group_id' => $group->id
            ];
        });

        Temperature::insert($temperatures->toArray());

        return new TemperatureResource($this->calculateTemperatures($temperatures->pluck('degree')));
    }

}
