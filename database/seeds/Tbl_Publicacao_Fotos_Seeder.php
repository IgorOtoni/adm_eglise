<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class Tbl_Publicacao_Fotos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_publicacao_fotos')->insert([
            'id'=>1,
            'id_publicacao'=>1,
            'foto'=>'foto-1-1-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_publicacao_fotos')->insert([
            'id'=>2,
            'id_publicacao'=>1,
            'foto'=>'foto-2-1-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_publicacao_fotos')->insert([
            'id'=>3,
            'id_publicacao'=>2,
            'foto'=>'foto-3-2-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_publicacao_fotos')->insert([
            'id'=>4,
            'id_publicacao'=>3,
            'foto'=>'foto-4-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_publicacao_fotos')->insert([
            'id'=>5,
            'id_publicacao'=>3,
            'foto'=>'foto-5-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_publicacao_fotos')->insert([
            'id'=>6,
            'id_publicacao'=>3,
            'foto'=>'foto-6-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_publicacao_fotos')->insert([
            'id'=>7,
            'id_publicacao'=>3,
            'foto'=>'foto-7-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_publicacao_fotos')->insert([
            'id'=>8,
            'id_publicacao'=>3,
            'foto'=>'foto-8-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
    }
}
