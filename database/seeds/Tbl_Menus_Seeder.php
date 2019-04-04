<?php

use Illuminate\Database\Seeder;

class Tbl_Menus_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_menus')->insert([
            'id'=>1,
            'id_configuracao'=>3,
            'nome'=>'Login',
            'link'=>'login',
            'ordem'=>1,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>2,
            'id_configuracao'=>3,
            'nome'=>'Sobre nós',
            'ordem'=>2,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>3,
            'id_configuracao'=>3,
            'nome'=>'Sermões',
            'link'=>'sermoes',
            'ordem'=>4,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>4,
            'id_configuracao'=>3,
            'nome'=>'Galeria',
            'link'=>'galeria',
            'ordem'=>5,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>5,
            'id_configuracao'=>3,
            'nome'=>'Publicações',
            'link'=>'noticias',
            'ordem'=>6,
        ]);

        DB::table('tbl_menus')->insert([
            'id'=>6,
            'id_configuracao'=>2,
            'nome'=>'Login',
            'link'=>'login',
            'ordem'=>1,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>7,
            'id_configuracao'=>2,
            'nome'=>'Sobre nós',
            'ordem'=>2,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>8,
            'id_configuracao'=>2,
            'nome'=>'Mídia',
            'ordem'=>4,
        ]);
        
        DB::table('tbl_menus')->insert([
            'id'=>9,
            'id_configuracao'=>3,
            'nome'=>'Eventos',
            'ordem'=>3,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>10,
            'id_configuracao'=>2,
            'nome'=>'Eventos',
            'ordem'=>3,
        ]);

        DB::table('tbl_menus')->insert([
            'id'=>11,
            'id_configuracao'=>1,
            'nome'=>'Login',
            'link'=>'login',
            'ordem'=>1,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>12,
            'id_configuracao'=>1,
            'nome'=>'Sobre nós',
            'ordem'=>2,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>13,
            'id_configuracao'=>1,
            'nome'=>'Mídia',
            'ordem'=>4,
        ]);
        DB::table('tbl_menus')->insert([
            'id'=>14,
            'id_configuracao'=>1,
            'nome'=>'Eventos',
            'ordem'=>3,
        ]);
    }
}
