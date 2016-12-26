<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(MakesTableSeeder::class);
        $this->call(ModelsTableSeeder::class);
        $this->call(FuelsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(ExtrasTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
    }
}
