<?php

$temperatures = [15,14,13,22,19,21,18,28];
$output = [];

foreach($temperatures as $index => $temperature)
{
    $nextTemperatures = array_slice(
        $temperatures,
        $index + 1, 
        count($temperatures),
        true # protect indexes
    );

    foreach($nextTemperatures as $nextTempIndex => $nextTemperature)
    {
        if ($temperature < $nextTemperature)
        {
            $output[] = [
                "temperature" => $temperatures[$index], 
                "interval" => $nextTempIndex - $index,
                "difference" => $nextTemperature - $temperature
            ];
            break;
        }
    }
}

foreach($output as $index => $temperatureItem)
{
    $index++;

    echo "Gün {$index}: $temperatureItem[temperature] dərəcə \n";
    echo "$temperatureItem[interval] gün sonra bu günə nisbətən $temperatureItem[difference] dərəcə daha isti olacaq\n\n";
}