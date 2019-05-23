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
        // Mebros para Igreja 1 =============================================================
        DB::table('tbl_membros')->insert([
            'id'=>1,
            'nome'=>"João",
            'id_funcao'=>1,
            'facebook'=>"http://facebook/profile/joaopastor",
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
            'id_funcao'=>1,
            'twitter'=>"http://twitter/profile/carlospastor",
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
        //////////////////////////////////////////////////////////////////////////////////////

        // Mebros para Igreja 2 =============================================================
        DB::table('tbl_membros')->insert([
            'id'=>7,
            'nome'=>"João",
            'id_funcao'=>6,
            'facebook'=>"http://facebook/profile/joaopastor",
            'id_igreja'=>2,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>8,
            'nome'=>"Maria",
            'id_igreja'=>2,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>9,
            'nome'=>"Carlos",
            'id_funcao'=>6,
            'twitter'=>"http://twitter/profile/carlospastor",
            'id_igreja'=>2,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>10,
            'nome'=>"Eduarda",
            'id_igreja'=>2,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>11,
            'nome'=>"André",
            'id_igreja'=>2,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>12,
            'nome'=>"Larissa",
            'id_igreja'=>2,
        ]);
        //////////////////////////////////////////////////////////////////////////////////////

        // Mebros para Igreja 1 =============================================================
        DB::table('tbl_membros')->insert([
            'id'=>13,
            'nome'=>"João",
            'id_funcao'=>11,
            'facebook'=>"http://facebook/profile/joaopastor",
            'id_igreja'=>3,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>14,
            'nome'=>"Maria",
            'id_igreja'=>3,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>15,
            'nome'=>"Carlos",
            'id_funcao'=>11,
            'twitter'=>"http://twitter/profile/carlospastor",
            'id_igreja'=>3,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>16,
            'nome'=>"Eduarda",
            'id_igreja'=>3,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>17,
            'nome'=>"André",
            'id_igreja'=>3,
        ]);

        DB::table('tbl_membros')->insert([
            'id'=>18,
            'nome'=>"Larissa",
            'id_igreja'=>3,
        ]);
        //////////////////////////////////////////////////////////////////////////////////////
    }
}
