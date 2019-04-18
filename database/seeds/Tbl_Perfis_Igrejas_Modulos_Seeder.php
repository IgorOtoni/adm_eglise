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
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>3,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>63, // Igreja 3 - Publicacoes
        ]);
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>4,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>60, // Igreja 3 - Sermoes
        ]);
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>5,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>57, // Igreja 3 - Banners
        ]);
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>6,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>54, // Igreja 3 - Noticia
        ]);
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>7,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>51, // Igreja 3 - Eventos
        ]);
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>8,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>48, // Igreja 3 - Eventos Fixos
        ]);
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>9,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>45, // Igreja 3 - Galerias
        ]);
        DB::table('tbl_perfis_igrejas_modulos')->insert([
            'id'=>10,
            'id_perfil'=>4, // pastor
            'id_modulo_igreja'=>66, // Igreja 3 - Configurações
        ]);
    }
}
