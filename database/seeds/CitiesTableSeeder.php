<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'city' => 'Zagreb',
                'postcode' => '10000',
                'created_at' => '2016-12-18 12:22:13',
                'updated_at' => '2016-12-18 12:22:13',
            ),
            1 => 
            array (
                'id' => 2,
                'city' => 'Split',
                'postcode' => '21000',
                'created_at' => '2016-12-18 12:22:13',
                'updated_at' => '2016-12-18 12:24:18',
            ),
            2 => 
            array (
                'id' => 3,
                'city' => 'Dubrovnik',
                'postcode' => '20000',
                'created_at' => '2016-12-18 12:23:54',
                'updated_at' => '2016-12-18 12:23:54',
            ),
            3 => 
            array (
                'id' => 4,
                'city' => 'Šibenik',
                'postcode' => '22000',
                'created_at' => '2016-12-18 12:24:04',
                'updated_at' => '2016-12-18 12:24:04',
            ),
            4 => 
            array (
                'id' => 5,
                'city' => 'Zadar',
                'postcode' => '23000',
                'created_at' => '2016-12-18 12:24:34',
                'updated_at' => '2016-12-18 12:24:34',
            ),
            5 => 
            array (
                'id' => 6,
                'city' => 'Rijeka',
                'postcode' => '51000',
                'created_at' => '2016-12-18 12:24:48',
                'updated_at' => '2016-12-18 12:24:48',
            ),
        ));
        
        
    }
}
