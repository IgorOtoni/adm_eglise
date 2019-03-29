<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class Tbl_Fotos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_fotos')->insert([
            'id'=>1,
            'id_galeria'=>1,
            'foto'=>'foto-1-1-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>2,
            'id_galeria'=>1,
            'foto'=>'foto-2-1-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>3,
            'id_galeria'=>2,
            'foto'=>'foto-1-2-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>4,
            'id_galeria'=>3,
            'foto'=>'foto-1-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>5,
            'id_galeria'=>3,
            'foto'=>'foto-2-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>6,
            'id_galeria'=>3,
            'foto'=>'foto-3-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>7,
            'id_galeria'=>3,
            'foto'=>'foto-4-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>8,
            'id_galeria'=>3,
            'foto'=>'foto-5-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>9,
            'id_galeria'=>3,
            'foto'=>'foto-6-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>10,
            'id_galeria'=>4,
            'foto'=>'foto-1-4-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>11,
            'id_galeria'=>4,
            'foto'=>'foto-2-4-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>12,
            'id_galeria'=>1,
            'foto'=>'foto-3-1-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
    }
}
