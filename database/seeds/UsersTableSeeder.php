<?php

use Illuminate\Database\Seeder;


/*
    |------------------------------------------------------------------------------------------------------------
    | Création de mon  UsersTableSeeder  qui me permet mon admninistrateur est quelque utilisateurs via les factory
    |------------------------------------------------------------------------------------------------------------
   */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$users = factory(App\User::class, 10)->create();
        
        DB::Table('users')->insert([
            ['name' => 'Diamile',
            'email' => 'papa2006@gmail.com',
            'phone'=>'0752823958',
            'password' => Hash::make('diamilesarr'),
            'is_admin'=>1,
            'adresse'=>'10 rue langueDoc',
            'lastName'=>'sada',
            'commentaires'=>'hello mister sarr',
            'postale'=>'95300',
            'ville'=>'paris'
        ],
        ['name' => 'Papa',
        'email' => 'papa2@gmail.com',
        'phone'=>'0752823958',
        'password' => Hash::make('papalatyr'),
        'is_admin'=>1,
        'adresse'=>'10 rue langueDoc',
        'lastName'=>'sada',
        'commentaires'=>'hello mister sarr',
        'postale'=>'95300',
        'ville'=>'paris']
            
        ]);
    }
}
