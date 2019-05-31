<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tbl_Comunidades_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_comunidades')->insert([
            'id'=>1,
            'id_igreja'=>1,
            'nome'=>"Grupo de jovens.",
            'descricao'=>"Grupo para a concetração dos jovens da igreja, com objetivo de promover encontros e retiros para os mesmos.",
        ]);

        DB::table('tbl_comunidades')->insert([
            'id'=>2,
            'id_igreja'=>2,
            'nome'=>"Grupo de jovens.",
            'descricao'=>"Grupo para a concetração dos jovens da igreja, com objetivo de promover encontros e retiros para os mesmos.",
        ]);

        DB::table('tbl_comunidades')->insert([
            'id'=>3,
            'id_igreja'=>3,
            'nome'=>"Grupo de jovens.",
            'descricao'=>"Grupo para a concetração dos jovens da igreja, com objetivo de promover encontros e retiros para os mesmos.",
        ]);
    }
}
