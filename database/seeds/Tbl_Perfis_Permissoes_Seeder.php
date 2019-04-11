<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tbl_Perfis_Permissoes_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>1,
            'id_perfil_igreja_modulo'=>1, // pastor - Igreja 3 - Usuarios
            'id_permissao'=>1, // incluir registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>2,
            'id_perfil_igreja_modulo'=>1, // pastor - Igreja 3 - Usuarios
            'id_permissao'=>2, // incluir registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>3,
            'id_perfil_igreja_modulo'=>2, // pastor - Igreja 3 - Perfis
            'id_permissao'=>2, // incluir registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>4,
            'id_perfil_igreja_modulo'=>2, // pastor - Igreja 3 - Perfis
            'id_permissao'=>3, // incluir registro
        ]);
    }
}
