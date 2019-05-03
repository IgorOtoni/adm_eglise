<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class Tbl_Galeria_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_galerias')->insert([
            'id'=>1,
            'nome'=>"Fotos da nossa igreja.",
            'id_igreja'=>3,
            'descricao'=>"Fotos da parte de fora da igreja onde nos reunimos.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-30),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>2,
            'nome'=>"Foto da missão de evangelização.",
            'id_igreja'=>3,
            'descricao'=>"Fotos da missão de evangelização feita na cidade de coronel fabriciano no dia 31 de abril.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-20),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>3,
            'nome'=>"Fotos dos nossos cultos",
            'id_igreja'=>3,
            'descricao'=>"Fotos dos cultos semanais do mês de abril.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>4,
            'nome'=>"Fotos do grupo de jovens",
            'id_igreja'=>3,
            'descricao'=>"Fotos da reunião do dia 1 de abril do grupo de jovens.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_galerias')->insert([
            'id'=>5,
            'nome'=>"Fotos da nossa igreja.",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-30),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>6,
            'nome'=>"Foto da missão de evangelização.",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-20),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>7,
            'nome'=>"Fotos dos nossos cultos",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>8,
            'nome'=>"Fotos do grupo de jovens",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_galerias')->insert([
            'id'=>9,
            'nome'=>"Fotos da nossa igreja.",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-30),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>10,
            'nome'=>"Foto da missão de evangelização.",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-20),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>11,
            'nome'=>"Fotos dos nossos cultos",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>12,
            'nome'=>"Fotos do grupo de jovens",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
    }
}
