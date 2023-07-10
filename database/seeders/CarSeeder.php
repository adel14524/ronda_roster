<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            Car::create([
                'code'          => generateRandomString(),
                'no_plate'      => generateRandomPlateNumber(),
                'updated_by'    => 1,
            ]);
        }


    }
}

    function generateRandomString() {
        $capitalLetters = range('A', 'Z'); // Array of capital letters

        $randomString = '';
        for ($i = 0; $i < 3; $i++) {
            $randomIndex = mt_rand(0, count($capitalLetters) - 1);
            $randomString .= $capitalLetters[$randomIndex];
        }

        return $randomString;
    }

    function generateRandomPlateNumber() {
        $prefixes = ['W', 'B', 'J', 'K', 'M', 'P', 'T'];
        $numbers = range(1, 9999);
        $suffixes = range('A', 'Z');

        $randomPrefix = $prefixes[array_rand($prefixes)];
        $randomNumber = str_pad(array_rand($numbers), 4, '0', STR_PAD_LEFT);
        $randomSuffix = $suffixes[array_rand($suffixes)];

        return $randomPrefix . $randomNumber . $randomSuffix;
    }
