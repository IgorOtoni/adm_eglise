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
            'id'=>13,
            'nome'=>'Usuários',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'usuarios',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>14,
            'nome'=>'Perfis',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'perfis',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>1,
            'nome'=>'Membros',
            'descricao'=>'',
            'rota'=>'membros',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>2,
            'nome'=>'Células',
            'descricao'=>'',
            'rota'=>'celula',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>3,
            'nome'=>'Dízimos',
            'descricao'=>'',
            'rota'=>'dizimo',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>4,
            'nome'=>'Despesas',
            'descricao'=>'',
            'rota'=>'despesa',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>5,
            'nome'=>'Eventos',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'evento',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>6,
            'nome'=>'Agenda Pastoral',
            'descricao'=>'',
            'rota'=>'agendaPastoral',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>7,
            'nome'=>'Escola Bíblica',
            'descricao'=>'',
            'rota'=>'escolaBiblica',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>8,
            'nome'=>'Configurações',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'configuracoes',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>9,
            'nome'=>'Notícias',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'noticais',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>10,
            'nome'=>'Galeria',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'galeria',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>11,
            'nome'=>'Doações',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'doacao',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>12,
            'nome'=>'Sermões',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'sermoes',
        ]);
    }
}
