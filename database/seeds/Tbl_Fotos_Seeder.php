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
            'foto'=>'foto-3-2-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>4,
            'id_galeria'=>3,
            'foto'=>'foto-4-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>5,
            'id_galeria'=>3,
            'foto'=>'foto-5-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>6,
            'id_galeria'=>3,
            'foto'=>'foto-6-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>7,
            'id_galeria'=>3,
            'foto'=>'foto-7-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>8,
            'id_galeria'=>3,
            'foto'=>'foto-8-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>9,
            'id_galeria'=>3,
            'foto'=>'foto-9-3-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>10,
            'id_galeria'=>4,
            'foto'=>'foto-10-4-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>11,
            'id_galeria'=>4,
            'foto'=>'foto-11-4-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>12,
            'id_galeria'=>1,
            'foto'=>'foto-12-1-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>13,
            'id_galeria'=>5,
            'foto'=>'foto-13-5-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>14,
            'id_galeria'=>5,
            'foto'=>'foto-14-5-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>15,
            'id_galeria'=>6,
            'foto'=>'foto-15-5-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>16,
            'id_galeria'=>7,
            'foto'=>'foto-16-6-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>17,
            'id_galeria'=>7,
            'foto'=>'foto-17-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>18,
            'id_galeria'=>7,
            'foto'=>'foto-18-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>19,
            'id_galeria'=>7,
            'foto'=>'foto-19-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>20,
            'id_galeria'=>7,
            'foto'=>'foto-20-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>21,
            'id_galeria'=>7,
            'foto'=>'foto-21-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>22,
            'id_galeria'=>8,
            'foto'=>'foto-22-8-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>23,
            'id_galeria'=>8,
            'foto'=>'foto-23-8-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>24,
            'id_galeria'=>5,
            'foto'=>'foto-24-8-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
    }
}
