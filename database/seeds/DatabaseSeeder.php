<?php

use Illuminate\Database\Seeder;

/*
    |-------------------------------------------------------------------------------------------------------
    | J'appel mon UsersTableSeeder avec la fonction call afin d'enregisrer mes données dans la base de donnée
    |-------------------------------------------------------------------------------------------------------
   */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
    }
}


