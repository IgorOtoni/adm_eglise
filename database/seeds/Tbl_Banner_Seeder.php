<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tbl_Banner_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tbl_banners')->insert([
            'id'=>1,
            'nome'=>'Banner 1',
            'descricao'=>'Teste teste teste teste teste teste teste teste teste teste teste teste.',
            'foto'=>'banner-1-1.jpg',
            'link'=>'/primeiraiba/noticia/5',
            'ordem'=>1,
            'id_igreja'=>1,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>2,
            'nome'=>'Banner 2',
            'descricao'=>'Teste teste teste teste teste teste teste teste teste teste teste teste.',
            'foto'=>'banner-2-1.jpg',
            'link'=>'/primeiraiba/evento/5',
            'ordem'=>2,
            'id_igreja'=>1,
        ]);

        DB::table('tbl_banners')->insert([
            'id'=>3,
            'nome'=>'Banner 1',
            'descricao'=>'Teste teste teste teste teste teste teste teste teste teste teste teste.',
            'foto'=>'banner-3-2.jpg',
            'link'=>'/primeiraiba',
            'ordem'=>2,
            'id_igreja'=>2,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>4,
            'nome'=>'Banner 2',
            'descricao'=>'Teste teste teste teste teste teste teste teste teste teste teste teste.',
            'foto'=>'banner-4-2.jpg',
            'link'=>null,
            'ordem'=>1,
            'id_igreja'=>2,
        ]);

        DB::table('tbl_banners')->insert([
            'id'=>5,
            'nome'=>'Banner 5',
            'descricao'=>'Teste teste teste teste teste teste teste teste teste teste teste teste.',
            'foto'=>'banner-5-3.jpg',
            'link'=>'/primeiraiba',
            'ordem'=>1,
            'id_igreja'=>3,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>6,
            'nome'=>'Banner 6',
            'descricao'=>'Teste teste teste teste teste teste teste teste teste teste teste teste.',
            'foto'=>'banner-6-3.jpg',
            'link'=>'/terceira',
            'ordem'=>2,
            'id_igreja'=>3,
        ]);

    }
}
