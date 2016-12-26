<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('branches')->delete();
        
        \DB::table('branches')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Zagreb Branch',
                'email' => 'zagreb@rentacar.com',
                'address' => 'Zagreb 88',
                'city_id' => 1,
                'phone' => '095 555 555',
                'created_at' => '2016-12-18 12:25:32',
                'updated_at' => '2016-12-18 12:25:32',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Split Branch',
                'email' => 'split@rentacar.com',
                'address' => 'Split 77',
                'city_id' => 2,
                'phone' => '095 555 555',
                'created_at' => '2016-12-18 12:25:56',
                'updated_at' => '2016-12-18 12:26:27',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dubrovnik Branch',
                'email' => 'dubrovnik@rentacar.com',
                'address' => 'Dubrovnik 55',
                'city_id' => 3,
                'phone' => '095 555 555',
                'created_at' => '2016-12-18 12:26:23',
                'updated_at' => '2016-12-18 12:26:23',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Šibenik Branch',
                'email' => 'sibenik@rentacar.com',
                'address' => 'Šibenik 11',
                'city_id' => 4,
                'phone' => '095 555 555',
                'created_at' => '2016-12-18 12:26:51',
                'updated_at' => '2016-12-18 12:26:51',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Zadar Branch',
                'email' => 'zadar@rentacar.com',
                'address' => 'Zadar 22',
                'city_id' => 5,
                'phone' => '095 555 555',
                'created_at' => '2016-12-18 12:27:12',
                'updated_at' => '2016-12-18 12:27:12',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Rijeka Branch',
                'email' => 'rijeka@rentacar.com',
                'address' => 'Rijeka 99',
                'city_id' => 6,
                'phone' => '095 555 555',
                'created_at' => '2016-12-18 12:27:37',
                'updated_at' => '2016-12-18 12:27:37',
            ),
        ));
        
        
    }
}
