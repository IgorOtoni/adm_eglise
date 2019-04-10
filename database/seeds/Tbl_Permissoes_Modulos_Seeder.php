<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tbl_Permissoes_Modulos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permissões do módulo de usuário
        DB::table('tbl_modulos_permissoes')->insert([
            'id'=>1,
            'id_modulo'=>13,
            'id_permissao'=>1,
        ]);
        DB::table('tbl_modulos_permissoes')->insert([
            'id'=>2,
            'id_modulo'=>13,
            'id_permissao'=>2,
        ]);
        DB::table('tbl_modulos_permissoes')->insert([
            'id'=>3,
            'id_modulo'=>13,
            'id_permissao'=>3,
        ]);
        //////////////////////////////////////

        // Permissões do módulo de perfis
        DB::table('tbl_modulos_permissoes')->insert([
            'id'=>4,
            'id_modulo'=>14,
            'id_permissao'=>1,
        ]);
        DB::table('tbl_modulos_permissoes')->insert([
            'id'=>5,
            'id_modulo'=>14,
            'id_permissao'=>2,
        ]);
        DB::table('tbl_modulos_permissoes')->insert([
            'id'=>6,
            'id_modulo'=>14,
            'id_permissao'=>3,
        ]);
        //////////////////////////////////////
    }
}
