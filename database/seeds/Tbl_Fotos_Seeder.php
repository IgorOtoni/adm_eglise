<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
            'foto'=>'foto-13-5-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>2,
            'id_galeria'=>1,
            'foto'=>'foto-14-5-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>3,
            'id_galeria'=>2,
            'foto'=>'foto-15-5-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>4,
            'id_galeria'=>3,
            'foto'=>'foto-16-6-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>5,
            'id_galeria'=>3,
            'foto'=>'foto-17-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>6,
            'id_galeria'=>3,
            'foto'=>'foto-18-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>7,
            'id_galeria'=>3,
            'foto'=>'foto-19-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>8,
            'id_galeria'=>3,
            'foto'=>'foto-20-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>9,
            'id_galeria'=>3,
            'foto'=>'foto-21-7-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>10,
            'id_galeria'=>4,
            'foto'=>'foto-22-8-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>11,
            'id_galeria'=>4,
            'foto'=>'foto-23-8-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>12,
            'id_galeria'=>1,
            'foto'=>'foto-24-8-1.jpg',
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

        DB::table('tbl_fotos')->insert([
            'id'=>25,
            'id_galeria'=>9,
            'foto'=>'foto-25-9-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>26,
            'id_galeria'=>9,
            'foto'=>'foto-26-9-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>27,
            'id_galeria'=>10,
            'foto'=>'foto-27-9-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>28,
            'id_galeria'=>11,
            'foto'=>'foto-28-10-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>29,
            'id_galeria'=>11,
            'foto'=>'foto-29-11-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>30,
            'id_galeria'=>11,
            'foto'=>'foto-30-11-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>31,
            'id_galeria'=>11,
            'foto'=>'foto-31-11-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>32,
            'id_galeria'=>11,
            'foto'=>'foto-32-11-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>33,
            'id_galeria'=>11,
            'foto'=>'foto-33-11-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>34,
            'id_galeria'=>12,
            'foto'=>'foto-34-11-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>35,
            'id_galeria'=>12,
            'foto'=>'foto-35-12-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>36,
            'id_galeria'=>9,
            'foto'=>'foto-36-12-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_fotos')->insert([
            'id'=>37,
            'id_galeria'=>13,
            'foto'=>'foto-37-13-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>38,
            'id_galeria'=>14,
            'foto'=>'foto-38-14-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>39,
            'id_galeria'=>15,
            'foto'=>'foto-39-15-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>40,
            'id_galeria'=>16,
            'foto'=>'foto-40-16-1.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>41,
            'id_galeria'=>17,
            'foto'=>'foto-41-17-2.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_fotos')->insert([
            'id'=>42,
            'id_galeria'=>18,
            'foto'=>'foto-42-18-3.jpg',
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
    }
}
