<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tbl_Modulos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_modulos')->insert([
            'nome'=>'Membros',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'nome'=>'Células',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'nome'=>'Dízimos',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'nome'=>'Despesas',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'nome'=>'Eventos',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'nome'=>'Agenda Pastoral',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'nome'=>'Escola Bíblica',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'nome'=>'Configurações',
            'descricao'=>''
        ]);
    }
}
