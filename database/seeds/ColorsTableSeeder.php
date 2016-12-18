<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colors')->delete();
        
        \DB::table('colors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'color' => 'Phantom Black',
                'created_at' => '2016-12-18 12:22:13',
                'updated_at' => '2016-12-18 12:22:13',
            ),
            1 => 
            array (
                'id' => 2,
                'color' => 'Sepang Blue',
                'created_at' => '2016-12-18 12:22:13',
                'updated_at' => '2016-12-18 12:22:13',
            ),
        ));
        
        
    }
}
