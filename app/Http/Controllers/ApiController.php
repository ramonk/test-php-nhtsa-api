<?php

namespace App\Http\Controllers;

use App\Service\NhtsaVehicleApiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    /**
     * @var NhtsaVehicleApiService
     */
    private $apiService;

    public function __construct(NhtsaVehicleApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function vehiclesGetAction(string $year, string $manufacturer, string $model, Request $request): JsonResponse
    {
        if ($request->query('withRating') === 'true') {
            $response = $this->apiService->getVehiclesWithRating($year, $manufacturer, $model);
        } else {
            $response = $this->apiService->getVehicles($year, $manufacturer, $model);
        }

        return new JsonResponse($response);
    }

    public function vehiclesJsonPostAction(Request $request): JsonResponse
    {
        $year = $request->json('modelYear');
        $manufacturer = $request->json('manufacturer');
        $model = $request->json('model');

        $response = $this->apiService->getVehicles($year, $manufacturer, $model);
        return new JsonResponse($response);
    }

}
