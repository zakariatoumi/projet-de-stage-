<?php

use Illuminate\Database\Seeder;

class secteurs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('secteurs')->insert([
            'secteur'=>'s1',
            'discription'=>'mmmmmmmm',
        ]);
        \Illuminate\Support\Facades\DB::table('secteurs')->insert([
            'secteur'=>'s2',
            'discription'=>'kkkkkkk',
        ]);
        \Illuminate\Support\Facades\DB::table('secteurs')->insert([
            'secteur'=>'s3',
            'discription'=>'dddddddd',
        ]);
        
    }
}
