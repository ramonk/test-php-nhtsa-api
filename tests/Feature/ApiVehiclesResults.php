<?php

namespace Tests\Feature;

class ApiVehiclesResults
{
    public const AUDI_A3 = [
        'Count' => 4,
        'Results'=> [
            [
                'Description' => '2015 Audi A3 4 DR AWD',
                'VehicleId' => 9403,
            ],
            [
                'Description' => '2015 Audi A3 4 DR FWD',
                'VehicleId' => 9408,
            ],
            [
                'Description' => '2015 Audi A3 C AWD',
                'VehicleId' => 9405,
            ],
            [
                'Description' => '2015 Audi A3 C FWD',
                'VehicleId' => 9406,
            ],
        ],
    ];

    public const TOYOTA_YARIS = [
        'Count' => 2,
        'Results'=> [
            [
                'Description' => '2015 Toyota Yaris 3 HB FWD',
                'VehicleId' => 9791,
            ],
            [
                'Description' => '2015 Toyota Yaris Liftback 5 HB FWD',
                'VehicleId' => 9146,
            ],
        ],
    ];

    public const EMPTY_RESULT = [
        'Count' => 0,
        'Results'=> [
        ],
    ];

    public const AUDI_A3_WITH_RATING = [
        'Count' => 4,
        'Results'=> [
            [
                'Description' => '2015 Audi A3 4 DR AWD',
                'VehicleId' => 9403,
                'CrashRating' => '5',
            ],
            [
                'Description' => '2015 Audi A3 4 DR FWD',
                'VehicleId' => 9408,
                'CrashRating' => '5',
            ],
            [
                'Description' => '2015 Audi A3 C AWD',
                'VehicleId' => 9405,
                'CrashRating' => 'Not Rated',
            ],
            [
                'Description' => '2015 Audi A3 C FWD',
                'VehicleId' => 9406,
                'CrashRating' => 'Not Rated',
            ],
        ],
    ];

    public const TOYOTA_YARIS_WITH_RATING = [
        'Count' => 2,
        'Results'=> [
            [
                'Description' => '2015 Toyota Yaris 3 HB FWD',
                'VehicleId' => 9791,
                'CrashRating' => 'Not Rated',
            ],
            [
                'Description' => '2015 Toyota Yaris Liftback 5 HB FWD',
                'VehicleId' => 9146,
                'CrashRating' => '4',
            ],
        ],
    ];

}
