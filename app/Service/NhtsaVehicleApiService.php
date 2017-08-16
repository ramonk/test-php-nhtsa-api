<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class NhtsaVehicleApiService
{

    private const BASE_URI = 'https://one.nhtsa.gov/webapi/api/SafetyRatings/';
    private const VEHICLES_URI = 'modelyear/{year}/make/{manufacturer}/model/{model}?format=json';
    private const RATING_URI = 'VehicleId/{id}?format=json';

    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URI,
        ]);
    }

    public function getVehicles(?string $year, ?string $manufacturer, ?string $model): array
    {
        $url = str_replace(
            ['{year}', '{manufacturer}', '{model}'],
            [$year, $manufacturer, $model],
            self::VEHICLES_URI
        );
        try {
            $response = $this->client->request('GET', $url);
            $content = $this->getContent($response);

            unset($content['Message']);

            $content['Results'] = array_map(function (array $vehicle) {
                $vehicle['Description'] = $vehicle['VehicleDescription'];
                unset($vehicle['VehicleDescription']);
                return $vehicle;
            }, $content['Results']);
        } catch (\Throwable $exception) {
            $content = [
                'Count' => 0,
                'Results' => [],
            ];
        }

        return $content;
    }

    public function getVehiclesWithRating(?string $year, ?string $manufacturer, ?string $model): array
    {
        $vehicles = $this->getVehicles($year, $manufacturer, $model);

        $vehicles['Results'] = array_map(function (array $vehicle) {
            $url = str_replace('{id}', $vehicle['VehicleId'], self::RATING_URI);
            $response = $this->client->request('GET', $url);
            $content = $this->getContent($response);

            $vehicle['CrashRating'] = $content['Results'][0]['OverallRating'];
            return $vehicle;
        }, $vehicles['Results']);

        return $vehicles;
    }

    private function getContent(Response $response): array
    {
        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }

}