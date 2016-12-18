<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('types')->delete();
        
        \DB::table('types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'class' => 'Premium',
                'created_at' => '2016-12-18 12:22:13',
                'updated_at' => '2016-12-18 12:22:13',
            ),
            1 => 
            array (
                'id' => 2,
                'class' => 'Middle',
                'created_at' => '2016-12-18 12:22:13',
                'updated_at' => '2016-12-18 12:22:13',
            ),
            2 => 
            array (
                'id' => 3,
                'class' => 'Compact',
                'created_at' => '2016-12-18 12:51:45',
                'updated_at' => '2016-12-18 12:51:51',
            ),
        ));
        
        
    }
}
