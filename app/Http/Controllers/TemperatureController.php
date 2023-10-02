<?php

namespace App\Http\Controllers;

use App\Models\TemperatureGroup;
use App\Http\Traits\TemperatureTrait;

class TemperatureController extends Controller
{
    use TemperatureTrait;

    public function index()
    {
        $temperatureGroups = TemperatureGroup::with('temperatures')->paginate(10);

        $tempGroups = $temperatureGroups->map(function ($group) {
            return $this->calculateTemperatures($group->temperatures->pluck('degree'));
        });
        
        return view('welcome', compact(
            'tempGroups'
        ));
    }
}