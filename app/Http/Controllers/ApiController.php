<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{

    public function vehiclesAction($year, $manufacturer, $model)
    {
        return new JsonResponse(['year' => $year, 'manufacturer' => $manufacturer, 'model' => $model]);
    }
}
