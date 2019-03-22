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
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'complemento' => 'Galpão',
            'num'=> '230',
            'cep'=> '35.181-018',
            'logo'=> 'logo-igreja-1.jpg',
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Segunda Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'complemento' => 'Galpão',
            'num'=>'230',
            'cep'=>'35.181-018',
            'logo'=> 'logo-igreja-1.jpg',
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Terceira Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'complemento' => 'Galpão',
            'num'=>'230',
            'cep'=>'35.181-018',
        ]);
    }
}
