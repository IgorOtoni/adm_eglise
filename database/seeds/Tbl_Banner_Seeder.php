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
            'nome'=>'Venha conhecer nossa Igreja!',
            'descricao'=>'Clique aqui para saber mais sobre nossa localização e contatos.',
            'foto'=>'banner-1-1.jpg',
            'link'=>'contatos',
            'ordem'=>1,
            'id_igreja'=>1,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>2,
            'nome'=>'Saiba quem somos e no que acreditamos!',
            'descricao'=>'Clique aqui para saber mais sobre nossa missão e nossos pastores.',
            'foto'=>'banner-2-1.jpg',
            'link'=>'apresentacao',
            'ordem'=>2,
            'id_igreja'=>1,
        ]);

        DB::table('tbl_banners')->insert([
            'id'=>3,
            'nome'=>'Venha conhecer nossa Igreja!',
            'descricao'=>'Clique aqui para saber mais sobre nossa localização e contatos.',
            'foto'=>'banner-3-2.jpg',
            'link'=>'contatos',
            'ordem'=>2,
            'id_igreja'=>2,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>4,
            'nome'=>'Saiba quem somos e no que acreditamos!',
            'descricao'=>'Clique aqui para saber mais sobre nossa missão e nossos pastores.',
            'foto'=>'banner-4-2.jpg',
            'link'=>'apresentacao',
            'ordem'=>1,
            'id_igreja'=>2,
        ]);

        DB::table('tbl_banners')->insert([
            'id'=>5,
            'nome'=>'Venha conhecer nossa Igreja!',
            'descricao'=>'Clique aqui para saber mais sobre nossa localização e contatos.',
            'foto'=>'banner-5-3.jpg',
            'link'=>'contatos',
            'ordem'=>1,
            'id_igreja'=>3,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>6,
            'nome'=>'Saiba quem somos e no que acreditamos!',
            'descricao'=>'Clique aqui para saber mais sobre nossa missão e nossos pastores.',
            'foto'=>'banner-6-3.jpg',
            'link'=>'apresentacao',
            'ordem'=>2,
            'id_igreja'=>3,
        ]);

        DB::table('tbl_banners')->insert([
            'id'=>7,
            'nome'=>'Conheça nosso grupo de oração!',
            'descricao'=>'Clique aqui para saber mais sobre nosso grupo de oração.',
            'foto'=>'banner-7-1.jpg',
            'link'=>'eventosfixos/4',
            'ordem'=>4,
            'id_igreja'=>1,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>8,
            'nome'=>'Venha em um de nossos cultos!',
            'descricao'=>'Clique aqui para saber mais sobre nossos cultos semanais.',
            'foto'=>'banner-8-1.jpg',
            'link'=>'eventosfixos/5',
            'ordem'=>3,
            'id_igreja'=>1,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>9,
            'nome'=>'Conheça nosso grupo de jovens!',
            'descricao'=>'Clique aqui para saber mais sobre nosso grupo de jovens.',
            'foto'=>'banner-9-1.jpg',
            'link'=>'eventosfixos/10',
            'ordem'=>5,
            'id_igreja'=>1,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>10,
            'nome'=>'Estude a bíblia conosco!',
            'descricao'=>'Clique aqui para saber mais sobre nosso grupo de reflexão bíblica.',
            'foto'=>'banner-10-1.jpg',
            'link'=>'eventosfixos/13',
            'ordem'=>6,
            'id_igreja'=>1,
        ]);

        DB::table('tbl_banners')->insert([
            'id'=>11,
            'nome'=>'Conheça nosso grupo de oração!',
            'descricao'=>'Clique aqui para saber mais sobre nosso grupo de oração.',
            'foto'=>'banner-11-2.jpg',
            'link'=>'eventosfixos/7',
            'ordem'=>4,
            'id_igreja'=>2,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>12,
            'nome'=>'Venha em um de nossos cultos!',
            'descricao'=>'Clique aqui para saber mais sobre nossos cultos semanais.',
            'foto'=>'banner-12-2.jpg',
            'link'=>'eventosfixos/8',
            'ordem'=>3,
            'id_igreja'=>2,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>13,
            'nome'=>'Conheça nosso grupo de jovens!',
            'descricao'=>'Clique aqui para saber mais sobre nosso grupo de jovens.',
            'foto'=>'banner-13-2.jpg',
            'link'=>'eventosfixos/11',
            'ordem'=>5,
            'id_igreja'=>2,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>14,
            'nome'=>'Estude a bíblia conosco!',
            'descricao'=>'Clique aqui para saber mais sobre nosso grupo de reflexão bíblica.',
            'foto'=>'banner-14-2.jpg',
            'link'=>'eventosfixos/14',
            'ordem'=>6,
            'id_igreja'=>2,
        ]);

        DB::table('tbl_banners')->insert([
            'id'=>15,
            'nome'=>'Conheça nosso grupo de oração!',
            'descricao'=>'Clique aqui para saber mais sobre nosso grupo de oração.',
            'foto'=>'banner-15-3.jpg',
            'link'=>'eventosfixos/1',
            'ordem'=>4,
            'id_igreja'=>3,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>16,
            'nome'=>'Venha em um de nossos cultos!',
            'descricao'=>'Clique aqui para saber mais sobre nossos cultos semanais.',
            'foto'=>'banner-16-3.jpg',
            'link'=>'eventosfixos/2',
            'ordem'=>3,
            'id_igreja'=>3,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>17,
            'nome'=>'Conheça nosso grupo de jovens!',
            'descricao'=>'Clique aqui para saber mais sobre nosso grupo de jovens.',
            'foto'=>'banner-17-3.jpg',
            'link'=>'eventosfixos/12',
            'ordem'=>5,
            'id_igreja'=>3,
        ]);
        DB::table('tbl_banners')->insert([
            'id'=>18,
            'nome'=>'Estude a bíblia conosco!',
            'descricao'=>'Clique aqui para saber mais sobre nosso grupo de reflexão bíblica.',
            'foto'=>'banner-18-3.jpg',
            'link'=>'eventosfixos/15',
            'ordem'=>6,
            'id_igreja'=>3,
        ]);
    }
}
