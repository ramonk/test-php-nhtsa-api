<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiGetVehiclesTest extends TestCase
{

    public function testAudiA3()
    {
        $response = $this->get('/vehicles/2015/Audi/A3');
        $response->assertExactJson(ApiVehiclesResults::AUDI_A3);
    }

    public function testToyotaYaris()
    {
        $response = $this->get('/vehicles/2015/Toyota/Yaris');
        $response->assertExactJson(ApiVehiclesResults::TOYOTA_YARIS);
    }

    public function testFordCrownVictoria()
    {
        $response = $this->get('/vehicles/2013/Ford/CrownVictoria');
        $response->assertExactJson(ApiVehiclesResults::EMPTY_RESULT);
    }

    public function testFordFusion()
    {
        $response = $this->get('/vehicles/undefined/Ford/Fusion');
        $response->assertExactJson(ApiVehiclesResults::EMPTY_RESULT);
    }
}
