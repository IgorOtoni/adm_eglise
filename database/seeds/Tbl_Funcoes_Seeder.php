<?php

use Illuminate\Database\Seeder;

class Tbl_Funcoes_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Funções da igreja 1 ==============================================================
        DB::table('tbl_funcoes')->insert([
            'id'=>1,
            'nome'=>"Pastor",
            'apresentar'=>true,
            'id_igreja'=>1,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>2,
            'nome'=>"Secretário",
            'id_igreja'=>1,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>3,
            'nome'=>"Músico",
            'id_igreja'=>1,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>4,
            'nome'=>"Missionário",
            'id_igreja'=>1,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>5,
            'nome'=>"Líder de grupo",
            'id_igreja'=>1,
        ]);
        //////////////////////////////////////////////////////////////////////////////////////

        // Funções da igreja 2 ==============================================================
        DB::table('tbl_funcoes')->insert([
            'id'=>6,
            'nome'=>"Pastor",
            'apresentar'=>true,
            'id_igreja'=>2,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>7,
            'nome'=>"Secretário",
            'id_igreja'=>2,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>8,
            'nome'=>"Músico",
            'id_igreja'=>2,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>9,
            'nome'=>"Missionário",
            'id_igreja'=>2,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>10,
            'nome'=>"Líder de grupo",
            'id_igreja'=>2,
        ]);
        //////////////////////////////////////////////////////////////////////////////////////

        // Funções da igreja 3 ==============================================================
        DB::table('tbl_funcoes')->insert([
            'id'=>11,
            'nome'=>"Pastor",
            'apresentar'=>true,
            'id_igreja'=>3,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>12,
            'nome'=>"Secretário",
            'id_igreja'=>3,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>13,
            'nome'=>"Músico",
            'id_igreja'=>3,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>14,
            'nome'=>"Missionário",
            'id_igreja'=>3,
        ]);

        DB::table('tbl_funcoes')->insert([
            'id'=>15,
            'nome'=>"Líder de grupo",
            'id_igreja'=>3,
        ]);
        //////////////////////////////////////////////////////////////////////////////////////
    }
}
