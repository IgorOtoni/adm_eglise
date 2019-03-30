<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class Tbl_Eventos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_eventos')->insert([
            'id'=>1,
            'nome'=>"Jejum e oração",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(4),
            'dados_horario_fim'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(5),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>3,
            'foto'=>"timeline-1-3.jpg",
            'descricao'=>"A igreja estará jejuando e orando juntos pela intenção X.",
        ]);
        DB::table('tbl_eventos')->insert([
            'id'=>2,
            'nome'=>"Festa da páscoa",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(10),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>3,
            'descricao'=>"Comemoração da páscoa, viva a ressureição de Jesus Cristo.",
        ]);
        DB::table('tbl_eventos')->insert([
            'id'=>3,
            'nome'=>"Festa do natal",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(15),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>3,
            'descricao'=>"Comemoração do natal, viva ao nascimento de Jesus Cristo.",
        ]);
        DB::table('tbl_eventos')->insert([
            'id'=>4,
            'nome'=>"Palestra sobre a plataforma Église",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(20),
            'dados_horario_fim'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(21),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>3,
            'foto'=>"timeline-4-3.jpg",
            'descricao'=>"Palestra divulgando a plataforma Église e sua utilização para ministros e membros.",
        ]);

        DB::table('tbl_eventos')->insert([
            'id'=>5,
            'nome'=>"Jejum e oração",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(4),
            'dados_horario_fim'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(5),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>1,
            'foto'=>"timeline-1-3.jpg",
            'descricao'=>"A igreja estará jejuando e orando juntos pela intenção X.",
        ]);
        DB::table('tbl_eventos')->insert([
            'id'=>6,
            'nome'=>"Festa da páscoa",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(10),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>1,
            'descricao'=>"Comemoração da páscoa, viva a ressureição de Jesus Cristo.",
        ]);
        DB::table('tbl_eventos')->insert([
            'id'=>7,
            'nome'=>"Festa do natal",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(15),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>1,
            'descricao'=>"Comemoração do natal, viva ao nascimento de Jesus Cristo.",
        ]);
        DB::table('tbl_eventos')->insert([
            'id'=>8,
            'nome'=>"Palestra sobre a plataforma Église",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(20),
            'dados_horario_fim'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(21),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>1,
            'foto'=>"timeline-4-3.jpg",
            'descricao'=>"Palestra divulgando a plataforma Église e sua utilização para ministros e membros.",
        ]);

        DB::table('tbl_eventos')->insert([
            'id'=>9,
            'nome'=>"Jejum e oração",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(4),
            'dados_horario_fim'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(5),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>2,
            'foto'=>"timeline-1-3.jpg",
            'descricao'=>"A igreja estará jejuando e orando juntos pela intenção X.",
        ]);
        DB::table('tbl_eventos')->insert([
            'id'=>10,
            'nome'=>"Festa da páscoa",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(10),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>2,
            'descricao'=>"Comemoração da páscoa, viva a ressureição de Jesus Cristo.",
        ]);
        DB::table('tbl_eventos')->insert([
            'id'=>11,
            'nome'=>"Festa do natal",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(15),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>2,
            'descricao'=>"Comemoração do natal, viva ao nascimento de Jesus Cristo.",
        ]);
        DB::table('tbl_eventos')->insert([
            'id'=>12,
            'nome'=>"Palestra sobre a plataforma Église",
            'dados_horario_inicio'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(20),
            'dados_horario_fim'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(21),
            'dados_local'=>"Na própria igreja.",
            'id_igreja'=>2,
            'foto'=>"timeline-4-3.jpg",
            'descricao'=>"Palestra divulgando a plataforma Église e sua utilização para ministros e membros.",
        ]);
    }
}
