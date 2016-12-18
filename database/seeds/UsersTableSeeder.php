<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Toni',
                'email' => 'test@mail.com',
                'password' => '$2y$10$9.uGMbXwMI9t9zJ4o1kp5uhOuM5s0o/aQ6Ge9FYbvE09GP7uG0vFW',
                'isAdmin' => 1,
                'address' => 'FA 57',
                'city' => NULL,
                'phone' => '555-555',
                'remember_token' => 'wMsKrJukbKD7Ix2h0Hbswothly51YXflK7NEdMoPHlOpCjORsQIbSlSjDWiB',
                'created_at' => '2016-12-18 12:22:13',
                'updated_at' => '2016-12-18 12:23:06',
            ),
        ));
        
        
    }
}
