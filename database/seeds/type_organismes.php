<?php

use Illuminate\Database\Seeder;

class type_organismes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('type_organismes')->insert([
            'type_org'=>'Org1'
        ]);
        \Illuminate\Support\Facades\DB::table('type_organismes')->insert([
            'type_org'=>'Org2'
        ]);
        \Illuminate\Support\Facades\DB::table('type_organismes')->insert([
            'type_org'=>'Org3'
        ]);
        \Illuminate\Support\Facades\DB::table('type_organismes')->insert([
            'type_org'=>'Org4'
        ]);
    }
}
