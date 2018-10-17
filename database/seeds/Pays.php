<?php

use Illuminate\Database\Seeder;

class Pays extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('pays')->insert([
            'nomPays'=>'Maroc'
        ]);
        \Illuminate\Support\Facades\DB::table('pays')->insert([
            'nomPays'=>'Algérie'
        ]);
        \Illuminate\Support\Facades\DB::table('pays')->insert([
            'nomPays'=>'tunis'
        ]);
        \Illuminate\Support\Facades\DB::table('pays')->insert([
            'nomPays'=>'Égypte'
        ]);
        \Illuminate\Support\Facades\DB::table('pays')->insert([
            'nomPays'=>'Côte d’Ivoire'
        ]);
        \Illuminate\Support\Facades\DB::table('pays')->insert([
            'nomPays'=>'Cap-Vert'
        ]);
        \Illuminate\Support\Facades\DB::table('pays')->insert([
            'nomPays'=>'Botswana'
        ]);
    }
}
