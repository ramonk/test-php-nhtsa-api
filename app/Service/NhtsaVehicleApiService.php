<?php

namespace App\Service;

use GuzzleHttp\Client;

class NhtsaVehicleApiService
{

    private const VEHICLES_URL =
        'https://one.nhtsa.gov/webapi/api/SafetyRatings/modelyear/{year}/make/{manufacturer}/model/{model}?format=json';

    public function getVehicles(int $year, string $manufacturer, string $model): array
    {
        $client = new Client();
        $url = str_replace(['{year}', '{manufacturer}', '{model}'], [$year, $manufacturer, $model], self::VEHICLES_URL);
        $response = $client->request('GET', $url);

        $content = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        unset($content['Message']);

        $content['Results'] = array_map(function (array $result) {
            $result['Description'] = $result['VehicleDescription'];
            unset($result['VehicleDescription']);
            return $result;
        }, $content['Results']);

        return $content;
    }

}