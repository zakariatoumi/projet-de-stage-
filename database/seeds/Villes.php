<?php

use Illuminate\Database\Seeder;

class Villes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Casablanca',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Rabat',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Marrakech',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Casablanca',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Tanger',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Fès',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Agadir',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Meknès',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Oujda',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Essaouira',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Tétouan',
            'pays_id'=>'1'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Safi',
            'pays_id'=>'1'
        ]);

        /*---------------- ------------- */

        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Alger',
            'pays_id'=>'2'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Oran',
            'pays_id'=>'2'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Constantine',
            'pays_id'=>'2'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Annaba',
            'pays_id'=>'2'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Tlemcen',
            'pays_id'=>'2'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Béjaïa',
            'pays_id'=>'2'
        ]);
        \Illuminate\Support\Facades\DB::table('villes')->insert([
            'nomVille'=>'Sétif',
            'pays_id'=>'2'
        ]);



    }
}
