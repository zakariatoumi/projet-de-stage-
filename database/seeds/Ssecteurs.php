<?php

use Illuminate\Database\Seeder;

class Ssecteurs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('sous_secteurs')->insert([
            'Ssecteur'=>'Ss1',
            'description'=>'mmmmmmmm',
            'secteur_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('sous_secteurs')->insert([
            'Ssecteur'=>'Ss2',
            'description'=>'dddddddd',
            'secteur_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('sous_secteurs')->insert([
            'Ssecteur'=>'Ss3',
            'description'=>'kkkkkkkkkkk',
            'secteur_id'=>'2'
        ]);
        \Illuminate\Support\Facades\DB::table('sous_secteurs')->insert([
            'Ssecteur'=>'Ss4',
            'description'=>'eeeeeeeeeeee',
            'secteur_id'=>'2'
        ]);
        \Illuminate\Support\Facades\DB::table('sous_secteurs')->insert([
            'Ssecteur'=>'Ss5',
            'description'=>'sssssssssss',
            'secteur_id'=>'3'
        ]);
    }
}
