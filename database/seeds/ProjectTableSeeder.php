<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('projets')->insert(
            [
                [
                    'name' => 'projet DIABOU',
                    'statut' => 'diamilesarr2006@gmail.com',
                    'phone'=>'0752823958',
                    'adresse' => 'lolololol',
                    'responsable'=>'hello mister sarr',
                    'ville'=>'paris' 
                    ],
                    [
                        'name' => 'projet MARISTE',
                        'statut' => 'diamilesarr2006@gmail.com',
                        'phone'=>'0752823958',
                        'adresse' => 'lolololol',
                        'responsable'=>'hello mister sarr',
                        'ville'=>'paris' 
                    ],
                    [
                        'name' => 'projet MAMELLE',
                        'statut' => 'diamilesarr2006@gmail.com',
                        'phone'=>'0752823958',
                        'adresse' => 'lolololol',
                        'responsable'=>'hello mister sarr',
                        'ville'=>'paris' 
                    ],
                    [
                        'name' => 'projet COMICO',
                        'statut' => 'diamilesarr2006@gmail.com',
                        'phone'=>'0752823958',
                        'adresse' => 'lolololol',
                        'responsable'=>'hello mister sarr',
                        'ville'=>'paris' 
                    ]
            ]
           
        );
    }
}
