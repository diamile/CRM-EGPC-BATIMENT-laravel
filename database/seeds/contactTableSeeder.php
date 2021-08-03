<?php

use Illuminate\Database\Seeder;

class contactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('contacts')->insert([
            ['name' => 'Diamile',
            'telephone'=>'0752823958',
            'profession' => 'dev',
            'poste'=>'lol',
            'adresse'=>'10 rue langueDoc',
           ]
            
        ]);
    }
    
}



