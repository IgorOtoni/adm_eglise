<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tbl_Igrejas_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Primeira Igreja Batista'
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Segunda Igreja Batista'
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Terceira Igreja Batista'
        ]);
    }
}
