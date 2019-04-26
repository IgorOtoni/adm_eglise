<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tbl_Sub_Menus_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PRIMEIRA IBA ///////////////////////////////////////////////////////////////////////
        DB::table('tbl_sub_menus')->insert([
            'id'=>1,
            'id_menu'=>2,
            'nome'=>'Visões e valores',
            'link'=>'apresentacao',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>2,
            'id_menu'=>2,
            'nome'=>'Contatos',
            'link'=>'contato',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>3,
            'id_menu'=>9,
            'nome'=>'Eventos fixos',
            'link'=>'eventosfixos',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>4,
            'id_menu'=>9,
            'nome'=>'Linha do tempo',
            'link'=>'eventos',
            'ordem'=>2,
        ]);
        ///////////////////////////////////////////////////////////////////////////////////////

        // SEGUNDA IBA ///////////////////////////////////////////////////////////////////////
        DB::table('tbl_sub_menus')->insert([
            'id'=>5,
            'id_menu'=>7,
            'nome'=>'Visões e valores',
            'link'=>'apresentacao',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>6,
            'id_menu'=>7,
            'nome'=>'Contatos',
            'link'=>'contato',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>7,
            'id_menu'=>10,
            'nome'=>'Eventos fixos',
            'link'=>'eventosfixos',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>8,
            'id_menu'=>10,
            'nome'=>'Linha do tempo',
            'link'=>'eventos',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>9,
            'id_menu'=>8,
            'nome'=>'Sermões',
            'link'=>'sermoes',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>10,
            'id_menu'=>8,
            'nome'=>'Galeria',
            'link'=>'galeria',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>11,
            'id_menu'=>8,
            'nome'=>'Publicações',
            'link'=>'noticias',
            'ordem'=>3,
        ]);
        ///////////////////////////////////////////////////////////////////////////////////////

        // TERCEIRA IBA ///////////////////////////////////////////////////////////////////////
        DB::table('tbl_sub_menus')->insert([
            'id'=>12,
            'id_menu'=>12,
            'nome'=>'Visões e valores',
            'link'=>'apresentacao',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>13,
            'id_menu'=>12,
            'nome'=>'Contatos',
            'link'=>'contato',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>14,
            'id_menu'=>14,
            'nome'=>'Eventos fixos',
            'link'=>'eventosfixos',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>15,
            'id_menu'=>14,
            'nome'=>'Linha do tempo',
            'link'=>'eventos',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>16,
            'id_menu'=>13,
            'nome'=>'Sermões',
            'link'=>'sermoes',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>17,
            'id_menu'=>13,
            'nome'=>'Galeria',
            'link'=>'galeria',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>18,
            'id_menu'=>13,
            'nome'=>'Publicações',
            'link'=>'noticias',
            'ordem'=>3,
        ]);
        ///////////////////////////////////////////////////////////////////////////////////////
        
        // QUARTA IBA /////////////////////////////////////////////////////////////////////////
        DB::table('tbl_sub_menus')->insert([
            'id'=>19,
            'id_menu'=>15,
            'nome'=>'Visões e valores',
            'link'=>'apresentacao',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>20,
            'id_menu'=>15,
            'nome'=>'Contatos',
            'link'=>'contato',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>21,
            'id_menu'=>17,
            'nome'=>'Eventos fixos',
            'link'=>'eventosfixos',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>22,
            'id_menu'=>17,
            'nome'=>'Linha do tempo',
            'link'=>'eventos',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>23,
            'id_menu'=>16,
            'nome'=>'Sermões',
            'link'=>'sermoes',
            'ordem'=>1,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>24,
            'id_menu'=>16,
            'nome'=>'Galeria',
            'link'=>'galeria',
            'ordem'=>2,
        ]);
        DB::table('tbl_sub_menus')->insert([
            'id'=>25,
            'id_menu'=>16,
            'nome'=>'Publicações',
            'link'=>'noticias',
            'ordem'=>3,
        ]);
        ///////////////////////////////////////////////////////////////////////////////////////
        
    }
}
