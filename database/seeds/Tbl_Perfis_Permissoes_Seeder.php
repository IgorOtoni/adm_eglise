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
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>3,
            'id_perfil_igreja_modulo'=>1, // pastor - Igreja 3 - Usuarios
            'id_permissao'=>3, // alterar registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>4,
            'id_perfil_igreja_modulo'=>2, // pastor - Igreja 3 - Perfis
            'id_permissao'=>1, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>5,
            'id_perfil_igreja_modulo'=>2, // pastor - Igreja 3 - Perfis
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>6,
            'id_perfil_igreja_modulo'=>2, // pastor - Igreja 3 - Perfis
            'id_permissao'=>3, // desativar registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>7,
            'id_perfil_igreja_modulo'=>3, // pastor - Igreja 3 - Publicacoes
            'id_permissao'=>1, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>8,
            'id_perfil_igreja_modulo'=>3, // pastor - Igreja 3 - Publicacoes
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>9,
            'id_perfil_igreja_modulo'=>3, // pastor - Igreja 3 - Publicacoes
            'id_permissao'=>3, // desativar registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>10,
            'id_perfil_igreja_modulo'=>4, // pastor - Igreja 3 - Sermoes
            'id_permissao'=>1, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>11,
            'id_perfil_igreja_modulo'=>4, // pastor - Igreja 3 - Sermoes
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>12,
            'id_perfil_igreja_modulo'=>4, // pastor - Igreja 3 - Sermoes
            'id_permissao'=>3, // desativar registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>13,
            'id_perfil_igreja_modulo'=>5, // pastor - Igreja 3 - Banners
            'id_permissao'=>1, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>14,
            'id_perfil_igreja_modulo'=>5, // pastor - Igreja 3 - Banners
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>15,
            'id_perfil_igreja_modulo'=>5, // pastor - Igreja 3 - Banners
            'id_permissao'=>3, // desativar registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>16,
            'id_perfil_igreja_modulo'=>6, // pastor - Igreja 3 - Noticia
            'id_permissao'=>1, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>17,
            'id_perfil_igreja_modulo'=>6, // pastor - Igreja 3 - Noticia
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>18,
            'id_perfil_igreja_modulo'=>6, // pastor - Igreja 3 - Noticia
            'id_permissao'=>3, // desativar registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>19,
            'id_perfil_igreja_modulo'=>7, // pastor - Igreja 3 - Eventos
            'id_permissao'=>1, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>20,
            'id_perfil_igreja_modulo'=>7, // pastor - Igreja 3 - Eventos
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>21,
            'id_perfil_igreja_modulo'=>7, // pastor - Igreja 3 - Eventos
            'id_permissao'=>3, // desativar registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>22,
            'id_perfil_igreja_modulo'=>8, // pastor - Igreja 3 - Eventos Fixos
            'id_permissao'=>1, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>23,
            'id_perfil_igreja_modulo'=>8, // pastor - Igreja 3 - Eventos Fixos
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>24,
            'id_perfil_igreja_modulo'=>8, // pastor - Igreja 3 - Eventos Fixos
            'id_permissao'=>3, // desativar registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>25,
            'id_perfil_igreja_modulo'=>9, // pastor - Igreja 3 - Galerias
            'id_permissao'=>1, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>26,
            'id_perfil_igreja_modulo'=>9, // pastor - Igreja 3 - Galerias
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>27,
            'id_perfil_igreja_modulo'=>9, // pastor - Igreja 3 - Galerias
            'id_permissao'=>3, // desativar registro
        ]);

        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>28,
            'id_perfil_igreja_modulo'=>9, // pastor - Igreja 3 - Configurações
            'id_permissao'=>1, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>29,
            'id_perfil_igreja_modulo'=>9, // pastor - Igreja 3 - Configurações
            'id_permissao'=>2, // alterar registro
        ]);
        DB::table('tbl_perfis_permissoes')->insert([
            'id'=>30,
            'id_perfil_igreja_modulo'=>9, // pastor - Igreja 3 - Configurações
            'id_permissao'=>3, // desativar registro
        ]);
    }
}
