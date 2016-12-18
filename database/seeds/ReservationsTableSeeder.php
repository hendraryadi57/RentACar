<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reservations')->delete();
        
        \DB::table('reservations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'userID' => 1,
                'carID' => 1,
                'pickupLocation' => 1,
                'returnLocation' => 2,
                'pickupDate' => '2016-12-18 13:57:10',
                'returnDate' => '2016-12-19 15:00:00',
                'extras' => '"[3]"',
                'price' => 200,
                'isPending' => 1,
                'isPaid' => 1,
                'isCompleted' => 1,
                'created_at' => '2016-12-18 12:56:57',
                'updated_at' => '2016-12-18 12:57:10',
            ),
            1 => 
            array (
                'id' => 2,
                'userID' => 1,
                'carID' => 1,
                'pickupLocation' => 1,
                'returnLocation' => 1,
                'pickupDate' => '2016-12-19 14:00:00',
                'returnDate' => '2016-12-30 15:00:00',
                'extras' => '"[2,3]"',
                'price' => 2050,
                'isPending' => NULL,
                'isPaid' => NULL,
                'isCompleted' => NULL,
                'created_at' => '2016-12-18 12:57:34',
                'updated_at' => '2016-12-18 12:57:34',
            ),
        ));
        
        
    }
}
