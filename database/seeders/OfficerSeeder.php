<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use App\Models\Officer;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) {
            $num = rand(1, 10);
            $faker = Faker::create();
            $id = getRoleBatch($num);
            Officer::create([
                'name'          => $faker->name,
                'role_batch'    => $num,
                'batch_num'     => $id.str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT),
                'updated_by'    => 1,
            ]);
        }
    }

}
function getRoleBatch($id = null){

    $role = [
        1  =>  'ASP',
        2  =>  'SM',
        3  =>  'SJN',
        4  =>  'KPL',
        5  =>  'L/KPL',
        6  =>  'KONS',
        7  =>  'KPL/S',
        8  =>  'LK/S',
        9  =>  'K/S',
        10  =>  'KA',
    ];

    return !empty($id) ? $role[$id] : '' ;
}
