<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cars')->delete();
        
        \DB::table('cars')->insert(array (
            0 => 
            array (
                'id' => 1,
                'model_id' => 1,
                'fuel' => 1,
                'registration' => 'ZG1211GH',
                'color' => NULL,
                'year' => 0,
                'capacity' => 5,
                'isAutomatic' => 1,
                'equipment' => NULL,
                'class' => NULL,
                'type' => 2,
                'minAge' => 22,
                'pricePerDay' => 150,
                'img' => '89681411.jpg',
                'branchID' => 1,
                'created_at' => '2016-12-18 12:53:07',
                'updated_at' => '2016-12-18 12:53:07',
            ),
            1 => 
            array (
                'id' => 2,
                'model_id' => 3,
                'fuel' => 2,
                'registration' => 'ZG222BH',
                'color' => NULL,
                'year' => 0,
                'capacity' => 4,
                'isAutomatic' => 0,
                'equipment' => NULL,
                'class' => NULL,
                'type' => 3,
                'minAge' => 18,
                'pricePerDay' => 50,
                'img' => '46996627.jpg',
                'branchID' => 1,
                'created_at' => '2016-12-18 12:54:27',
                'updated_at' => '2016-12-18 12:54:27',
            ),
            2 => 
            array (
                'id' => 3,
                'model_id' => 5,
                'fuel' => 1,
                'registration' => 'ZG111kl',
                'color' => NULL,
                'year' => 0,
                'capacity' => 5,
                'isAutomatic' => 1,
                'equipment' => NULL,
                'class' => NULL,
                'type' => 2,
                'minAge' => 24,
                'pricePerDay' => 100,
                'img' => '44220422.jpg',
                'branchID' => 1,
                'created_at' => '2016-12-18 12:55:54',
                'updated_at' => '2016-12-18 12:55:54',
            ),
        ));
        
        
    }
}
