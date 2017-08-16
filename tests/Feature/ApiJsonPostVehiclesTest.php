<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiJsonPostVehiclesTest extends TestCase
{

    public function testAudiA3()
    {
        $response = $this->json(
            'POST',
            '/vehicles',
            ['modelYear' => 2015, 'manufacturer' => 'Audi', 'model' => 'A3']
        );
        $response->assertExactJson(ApiVehiclesResults::AUDI_A3);
    }

    public function testToyotaYaris()
    {
        $response = $this->json(
            'POST',
            '/vehicles',
            ['modelYear' => 2015, 'manufacturer' => 'Toyota', 'model' => 'Yaris']
        );
        $response->assertExactJson(ApiVehiclesResults::TOYOTA_YARIS);
    }

    public function testFordCrownVictoria()
    {
        $response = $this->json(
            'POST',
            '/vehicles',
            ['modelYear' => 2013, 'manufacturer' => 'Ford', 'model' => 'CrownVictoria']
        );
        $response->assertExactJson(ApiVehiclesResults::EMPTY_RESULT);
    }

    public function testHondaAccord()
    {
        $response = $this->json(
            'POST',
            '/vehicles',
            ['manufacturer' => 'Honda', 'model' => 'Accord']
        );
        $response->assertExactJson(ApiVehiclesResults::EMPTY_RESULT);
    }
}
