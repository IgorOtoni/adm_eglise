<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tbl_Perfis_Igrejas_Modulos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>1,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>39, // Igreja 3 - Usuarios
        ]);
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>2,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>42, // Igreja 3 - Perfis
        ]);
    }
}
