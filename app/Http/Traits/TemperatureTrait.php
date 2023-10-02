<?php

namespace App\Http\Traits;

use App\Models\TemperatureGroup;
use Illuminate\Support\Collection;

trait TemperatureTrait
{
    public function calculateTemperatures(Collection $temperatures): Collection
    {
        $output = new Collection;

        foreach($temperatures as $index => $temperature)
        {
            $nextTemperatures = $temperatures->slice(
                $index + 1,
                count($temperatures),
                true # protect indexes
            );

            foreach($nextTemperatures as $nextTempIndex => $nextTemperature)
            {
                if ($temperature < $nextTemperature)
                {
                    $output->push([
                        "degree" => $temperatures[$index], 
                        "interval" => $nextTempIndex - $index,
                        "difference" => $nextTemperature - $temperature
                    ]);
                    break;
                }
            }
        }

        return $output;
    }
}