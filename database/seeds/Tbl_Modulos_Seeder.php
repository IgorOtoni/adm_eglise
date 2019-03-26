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
            'id'=>1,
            'nome'=>'Membros',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>2,
            'nome'=>'Células',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>3,
            'nome'=>'Dízimos',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>4,
            'nome'=>'Despesas',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>5,
            'nome'=>'Eventos',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>6,
            'nome'=>'Agenda Pastoral',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>7,
            'nome'=>'Escola Bíblica',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>8,
            'nome'=>'Configurações',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>9,
            'nome'=>'Notícias',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>10,
            'nome'=>'Galeria',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>11,
            'nome'=>'Doações',
            'descricao'=>''
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>12,
            'nome'=>'Sermões',
            'descricao'=>''
        ]);
    }
}
