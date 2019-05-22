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
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>14,
            'nome'=>'Perfis',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'perfis',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>15,
            'nome'=>'Galerias',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'galerias',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>16,
            'nome'=>'Eventos fixos',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'eventosfixos',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>17,
            'nome'=>'Linha do tempo',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'eventos',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>18,
            'nome'=>'Notícias',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'noticias',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>19,
            'nome'=>'Banners',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'banners',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>20,
            'nome'=>'Sermões',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'sermoes',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>21,
            'nome'=>'Publicações',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'publicacoes',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>22,
            'nome'=>'Configurações',
            'descricao'=>'Funcionalidade do site gerencial.',
            'rota'=>'configuracoes',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>23,
            'nome'=>'Login',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'login',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>24,
            'nome'=>'Funções',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'funcoes',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>25,
            'nome'=>'Membros',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'membros',
            'gerencial'=>true,
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
            'nome'=>'Eventos Fixos',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'eventosfixos',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>6,
            'nome'=>'Linha do tempo',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'eventos',
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>7,
            'nome'=>'Agenda Pastoral',
            'descricao'=>'',
            'rota'=>'agendaPastoral',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>8,
            'nome'=>'Escola Bíblica',
            'descricao'=>'',
            'rota'=>'escolaBiblica',
            'gerencial'=>true,
        ]);
        DB::table('tbl_modulos')->insert([
            'id'=>9,
            'nome'=>'Notícias',
            'descricao'=>'Funcionalidade do site apresentativo.',
            'rota'=>'noticias',
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
