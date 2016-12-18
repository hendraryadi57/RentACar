<?php

use Illuminate\Database\Seeder;

class ExtrasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('extras')->delete();
        
        \DB::table('extras')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Insurance',
                'description' => 'Extra insurance',
                'price' => 100,
                'created_at' => '2016-12-18 12:22:13',
                'updated_at' => '2016-12-18 12:22:13',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '2. Insurance',
                'description' => '2. Extra insurance',
                'price' => 200,
                'created_at' => '2016-12-18 12:22:13',
                'updated_at' => '2016-12-18 12:22:13',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'GPS Device',
                'description' => 'GPS Device Setup',
                'price' => 50,
                'created_at' => '2016-12-18 12:51:27',
                'updated_at' => '2016-12-18 12:51:27',
            ),
        ));
        
        
    }
}
