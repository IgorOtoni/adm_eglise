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
            'nome'=>'Primeira Igreja Batista',
            'num'=>'230',
            'cep'=>'35.181-018',
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Segunda Igreja Batista',
            'num'=>'230',
            'cep'=>'35.181-018',
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Terceira Igreja Batista',
            'num'=>'230',
            'cep'=>'35.181-018',
        ]);
    }
}
