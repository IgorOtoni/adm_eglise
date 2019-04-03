<?php

use Illuminate\Database\Seeder;

class Tbl_Permissoes_Modulos_Perfis_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('tbl_perfis_modulos_permissoes')->insert([
            'id'=>1,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>39, // Igreja 3 - Usuarios
            'id_permissao'=>1, // incluir registro
        ]);*/
        DB::table('tbl_perfis_modulos_permissoes')->insert([
            'id'=>2,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>39, // Igreja 3 - Usuarios
            'id_permissao'=>2, // incluir registro
        ]);
        DB::table('tbl_perfis_modulos_permissoes')->insert([
            'id'=>3,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>39, // Igreja 3 - Usuarios
            'id_permissao'=>3, // incluir registro
        ]);
        DB::table('tbl_perfis_modulos_permissoes')->insert([
            'id'=>4,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>42, // Igreja 3 - Perfis
            'id_permissao'=>1, // incluir registro
        ]);
        /*DB::table('tbl_perfis_modulos_permissoes')->insert([
            'id'=>5,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>42, // Igreja 3 - Perfis
            'id_permissao'=>2, // incluir registro
        ]);*/
        DB::table('tbl_perfis_modulos_permissoes')->insert([
            'id'=>6,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>42, // Igreja 3 - Perfis
            'id_permissao'=>3, // incluir registro
        ]);
    }
}
