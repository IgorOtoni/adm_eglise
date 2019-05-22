<?php

use Illuminate\Database\Seeder;

class Tbl_Membros_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_membros')->insert([
            'id'=>1,
            'nome'=>"João",
            'id_igreja'=>1,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>2,
            'nome'=>"Maria",
            'id_igreja'=>1,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>3,
            'nome'=>"Carlos",
            'id_igreja'=>1,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>4,
            'nome'=>"Eduarda",
            'id_igreja'=>1,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>5,
            'nome'=>"André",
            'id_igreja'=>1,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>6,
            'nome'=>"Larissa",
            'id_igreja'=>1,
        ]);
    }
}
