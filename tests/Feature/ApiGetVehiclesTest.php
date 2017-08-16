<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiGetVehiclesTest extends TestCase
{

    public function testAudiA3()
    {
        $response = $this->get('/vehicles/2015/Audi/A3');

        $response->assertExactJson(
            [
                'Count' => 4,
                'Results'=> [
                    [
                        "Description" => "2015 Audi A3 4 DR AWD",
                        "VehicleId" => 9403
                    ],
                    [
                        "Description" => "2015 Audi A3 4 DR FWD",
                        "VehicleId" => 9408
                    ],
                    [
                        "Description" => "2015 Audi A3 C AWD",
                        "VehicleId" => 9405
                    ],
                    [
                        "Description" => "2015 Audi A3 C FWD",
                        "VehicleId" => 9406
                    ],
                ],
            ]
        );
    }

    public function testToyotaYaris()
    {
        $response = $this->get('/vehicles/2015/Toyota/Yaris');

        $response->assertExactJson(
            [
                'Count' => 2,
                'Results'=> [
                    [
                        "Description" => "2015 Toyota Yaris 3 HB FWD",
                        "VehicleId" => 9791
                    ],
                    [
                        "Description" => "2015 Toyota Yaris Liftback 5 HB FWD",
                        "VehicleId" => 9146
                    ],
                ],
            ]
        );
    }

    public function testFordCrownVictoria()
    {
        $response = $this->get('/vehicles/2013/Ford/CrownVictoria');

        $response->assertExactJson(
            [
                'Count' => 0,
                'Results'=> [
                ],
            ]
        );
    }
}
