<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'nome'=>"Álbum 1",
            'id_igreja'=>3,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>2,
            'nome'=>"Álbum 2",
            'id_igreja'=>3,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>3,
            'nome'=>"Álbum 3",
            'id_igreja'=>3,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-30),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>4,
            'nome'=>"Álbum 4",
            'id_igreja'=>3,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-20),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_galerias')->insert([
            'id'=>5,
            'nome'=>"Álbum 1",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>6,
            'nome'=>"Álbum 2",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>7,
            'nome'=>"Álbum 3",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-30),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>8,
            'nome'=>"Álbum 4",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-20),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_galerias')->insert([
            'id'=>9,
            'nome'=>"Álbum 1",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>10,
            'nome'=>"Álbum 2",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>11,
            'nome'=>"Álbum 3",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-30),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>12,
            'nome'=>"Álbum 4",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-20),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_galerias')->insert([
            'id'=>13,
            'nome'=>"Álbum 5",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>14,
            'nome'=>"Álbum 6",
            'id_igreja'=>1,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_galerias')->insert([
            'id'=>15,
            'nome'=>"Álbum 5",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>16,
            'nome'=>"Álbum 6",
            'id_igreja'=>2,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);

        DB::table('tbl_galerias')->insert([
            'id'=>17,
            'nome'=>"Álbum 5",
            'id_igreja'=>3,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
        DB::table('tbl_galerias')->insert([
            'id'=>18,
            'nome'=>"Álbum 6",
            'id_igreja'=>3,
            'descricao'=>"Blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla blablabla.",
            'data'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time())),
        ]);
    }
}
