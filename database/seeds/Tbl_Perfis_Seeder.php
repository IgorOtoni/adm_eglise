<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tbl_Perfis_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_perfis')->insert([
            'id'=>1,
            'nome'=>'ADM Eglise',
            'descricao'=>'Administrador da plataforma.'
        ]);

        DB::table('tbl_perfis')->insert([
            'id'=>2,
            'nome'=>'ADM Site',
            'descricao'=>'Administrador do site da igreja.'
        ]);

        DB::table('tbl_perfis')->insert([
            'id'=>3,
            'nome'=>'Membros',
            'descricao'=>'Consulta aos dízimos, eventos programados, links de materiais e sermões, células que participa e suas programações.'
        ]);

        DB::table('tbl_perfis')->insert([
            'id'=>4,
            'nome'=>'Pastor',
            'id_igreja'=>3,
            'descricao'=>'Agenda reuniões, temas, consulta a frequência dos membros, novos membros e aniversariantes.'
        ]);

        DB::table('tbl_perfis')->insert([
            'id'=>5,
            'nome'=>'Líder',
            'descricao'=>'Agenda reuniões, cadastro de locais de reuniões, consulta a frequência dos membros, novos membros e aniversariantes.'
        ]);
    }
}