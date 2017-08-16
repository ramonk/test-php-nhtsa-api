<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiGetVehiclesWithRatingTest extends TestCase
{

    public function testAudiA3()
    {
        $response = $this->get('/vehicles/2015/Audi/A3?withRating=true');
        $response->assertExactJson(ApiVehiclesResults::AUDI_A3_WITH_RATING);
    }

    public function testToyotaYaris()
    {
        $response = $this->get('/vehicles/2015/Toyota/Yaris?withRating=true');

        $response->assertExactJson(ApiVehiclesResults::TOYOTA_YARIS_WITH_RATING);
    }

    public function testFordCrownVictoria()
    {
        $response = $this->get('/vehicles/2013/Ford/CrownVictoria?withRating=true');

        $response->assertExactJson(ApiVehiclesResults::EMPTY_RESULT);
    }

    public function testWithRatingFalse()
    {
        $response = $this->get('/vehicles/2015/Audi/A3?withRating=false');
        $response->assertExactJson(ApiVehiclesResults::AUDI_A3);
    }

    public function testWithRatingOther()
    {
        $response = $this->get('/vehicles/2015/Audi/A3?withRating=bananas');
        $response->assertExactJson(ApiVehiclesResults::AUDI_A3);
    }
}
