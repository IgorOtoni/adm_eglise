<?php

use Illuminate\Database\Seeder;

class Tbl_Igrejas_Modulos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>1,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>2,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>3,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>4,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>5,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>6,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>7,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>8,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>9,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>10,
        ]);
        DB::table('tbl_igrejas_modulos')->insert([
            'id_igreja'=>3,
            'id_modulo'=>11,
        ]);
    }
}
