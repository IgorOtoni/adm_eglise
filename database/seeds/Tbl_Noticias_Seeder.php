<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class Tbl_Noticias_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_noticias')->insert([
            'id'=>1,
            'nome'=>"Plataforma Église é anunciada!",
            'id_igreja'=>3,
            'foto'=>"noticia-1-3.jpg",
            'descricao'=>"Nova plataforma Église é anunciada pela Hotsystems, e será um sistema de aprsentação e gerência para qualquer congregação religiosa.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>2,
            'nome'=>"Primeiro módulo da plataforma Église liberado!",
            'id_igreja'=>3,
            'foto'=>"noticia-2-3.jpg",
            'descricao'=>"Aquira agora seu contrato e ganhe seu site personalizado para divulgação de eventos, notícias e sermões.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-25),
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>3,
            'nome'=>"O pastor mister X estará no retiro de abril!",
            'id_igreja'=>3,
            'foto'=>null,
            'descricao'=>"O pastor mister X da alemnaha estará ministrando no retiro para jovens do dia 1 de Abril. Não perca a oportunidade de reecontra lo.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-10),
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>4,
            'nome'=>"O QUE???",
            'id_igreja'=>3,
            'foto'=>"noticia-4-3.jpg",
            'descricao'=>"Hum? O que? Não entendi... oi? Como? Quê?",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-5),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tbl_noticias')->insert([
            'id'=>5,
            'nome'=>"Plataforma Église é anunciada!",
            'id_igreja'=>1,
            'foto'=>"noticia-5-1.jpg",
            'descricao'=>"Nova plataforma Église é anunciada pela Hotsystems, e será um sistema de aprsentação e gerência para qualquer congregação religiosa.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>6,
            'nome'=>"Primeiro módulo da plataforma Église liberado!",
            'id_igreja'=>1,
            'foto'=>"noticia-6-1.jpg",
            'descricao'=>"Aquira agora seu contrato e ganhe seu site personalizado para divulgação de eventos, notícias e sermões.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-25),
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>7,
            'nome'=>"O pastor mister X estará no retiro de abril!",
            'id_igreja'=>1,
            'foto'=>null,
            'descricao'=>"O pastor mister X da alemnaha estará ministrando no retiro para jovens do dia 1 de Abril. Não perca a oportunidade de reecontra lo.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-10),
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>8,
            'nome'=>"O QUE???",
            'id_igreja'=>1,
            'foto'=>"noticia-8-1.jpg",
            'descricao'=>"Hum? O que? Não entendi... oi? Como? Quê?",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-5),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tbl_noticias')->insert([
            'id'=>9,
            'nome'=>"Plataforma Église é anunciada!",
            'id_igreja'=>2,
            'foto'=>"noticia-9-2.jpg",
            'descricao'=>"Nova plataforma Église é anunciada pela Hotsystems, e será um sistema de aprsentação e gerência para qualquer congregação religiosa.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>10,
            'nome'=>"Primeiro módulo da plataforma Église liberado!",
            'id_igreja'=>2,
            'foto'=>"noticia-10-2.jpg",
            'descricao'=>"Aquira agora seu contrato e ganhe seu site personalizado para divulgação de eventos, notícias e sermões.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-25),
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>11,
            'nome'=>"O pastor mister X estará no retiro de abril!",
            'id_igreja'=>2,
            'foto'=>null,
            'descricao'=>"O pastor mister X da alemnaha estará ministrando no retiro para jovens do dia 1 de Abril. Não perca a oportunidade de reecontra lo.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-10),
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>12,
            'nome'=>"O QUE???",
            'id_igreja'=>2,
            'foto'=>"noticia-12-2.jpg",
            'descricao'=>"Hum? O que? Não entendi... oi? Como? Quê?",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-5),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tbl_noticias')->insert([
            'id'=>13,
            'nome'=>"Precisamos de pessoas com talento musical.",
            'id_igreja'=>1,
            'descricao'=>"Queremos montar um coral para os cultos, se você estiver interssado, procure a igreja, telefone ou mande um email com seu nome informando seu interesse e habilidade.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(5),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>14,
            'nome'=>"Precisamos de pessoas com talento musical.",
            'id_igreja'=>2,
            'descricao'=>"Queremos montar um coral para os cultos, se você estiver interssado, procure a igreja, telefone ou mande um email com seu nome informando seu interesse e habilidade.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(5),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>15,
            'nome'=>"Precisamos de pessoas com talento musical.",
            'id_igreja'=>3,
            'descricao'=>"Queremos montar um coral para os cultos, se você estiver interssado, procure a igreja, telefone ou mande um email com seu nome informando seu interesse e habilidade.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(5),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tbl_noticias')->insert([
            'id'=>16,
            'nome'=>"Estamos vendendo rifas!",
            'id_igreja'=>1,
            'descricao'=>"Iremos sortear uma cesta de livros e CDs gospel, com objetivos de arrecadar fundos para missionários no Acre.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(10),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>17,
            'nome'=>"Estamos vendendo rifas!",
            'id_igreja'=>2,
            'descricao'=>"Iremos sortear uma cesta de livros e CDs gospel, com objetivos de arrecadar fundos para missionários no Acre.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(10),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>18,
            'nome'=>"Estamos vendendo rifas!",
            'id_igreja'=>3,
            'descricao'=>"Iremos sortear uma cesta de livros e CDs gospel, com objetivos de arrecadar fundos para missionários no Acre.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(10),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('tbl_noticias')->insert([
            'id'=>19,
            'nome'=>"A igreja passará por reformas no dia 1 de abril.",
            'id_igreja'=>1,
            'descricao'=>"O portão principal da igreja será reparado, pedimos a colaboração de todos para com os pedreiros e que evitem frequentar a igreja neste dia para que a obra ocorra bem.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(15),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>20,
            'nome'=>"A igreja passará por reformas no dia 1 de abril.",
            'id_igreja'=>2,
            'descricao'=>"O portão principal da igreja será reparado, pedimos a colaboração de todos para com os pedreiros e que evitem frequentar a igreja neste dia para que a obra ocorra bem.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(15),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('tbl_noticias')->insert([
            'id'=>21,
            'nome'=>"A igreja passará por reformas no dia 1 de abril.",
            'id_igreja'=>3,
            'descricao'=>"O portão principal da igreja será reparado, pedimos a colaboração de todos para com os pedreiros e que evitem frequentar a igreja neste dia para que a obra ocorra bem.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(15),
            'updated_at'=>Carbon::now()
        ]);
    }
}
