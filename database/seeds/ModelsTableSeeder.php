<?php

use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('models')->delete();
        
        \DB::table('models')->insert(array (
            0 => 
            array (
                'id' => 1,
                'make' => 1,
                'model' => 'A4',
                'created_at' => '2016-12-18 12:49:26',
                'updated_at' => '2016-12-18 12:49:26',
            ),
            1 => 
            array (
                'id' => 2,
                'make' => 2,
                'model' => 'Polo',
                'created_at' => '2016-12-18 12:49:42',
                'updated_at' => '2016-12-18 12:49:42',
            ),
            2 => 
            array (
                'id' => 3,
                'make' => 2,
                'model' => 'Up!',
                'created_at' => '2016-12-18 12:49:47',
                'updated_at' => '2016-12-18 12:49:47',
            ),
            3 => 
            array (
                'id' => 4,
                'make' => 3,
                'model' => '118d',
                'created_at' => '2016-12-18 12:49:55',
                'updated_at' => '2016-12-18 12:49:55',
            ),
            4 => 
            array (
                'id' => 5,
                'make' => 4,
                'model' => 'S40',
                'created_at' => '2016-12-18 12:50:01',
                'updated_at' => '2016-12-18 12:50:01',
            ),
            5 => 
            array (
                'id' => 6,
                'make' => 4,
                'model' => 'S40',
                'created_at' => '2016-12-18 12:50:24',
                'updated_at' => '2016-12-18 12:50:24',
            ),
            6 => 
            array (
                'id' => 7,
                'make' => 5,
                'model' => 'Yaris',
                'created_at' => '2016-12-18 12:50:34',
                'updated_at' => '2016-12-18 12:50:34',
            ),
        ));
        
        
    }
}
