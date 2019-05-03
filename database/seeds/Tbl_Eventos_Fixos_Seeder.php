<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tbl_Eventos_Fixos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>1,
            'nome'=>"Grupo de oração semanal",
            'dados_horario_local'=>"Todas as quartas as 7 horas da manhã na igreja.",
            'id_igreja'=>3,
            'foto'=>"evento-1-3.jpg",
            'descricao'=>"Grupo que se reúne para orar na igreja toda quarta as 7:00 horas da manhã, aberto a todos que queiram participar, leve sua família!",
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>2,
            'nome'=>"Culto semanal",
            'dados_horario_local'=>"Todas as sextas as 20 horas na igreja.",
            'id_igreja'=>3,
            'foto'=>"evento-2-3.jpg",
            'descricao'=>null,
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>3,
            'nome'=>"Atendimento aos membros",
            'dados_horario_local'=>"Sábados das 13 ás 17 horas na igreja.",
            'id_igreja'=>3,
            'foto'=>null,
            'descricao'=>"Tempo que os pastores dedicam a atender os membros na igreja.",
        ]);

        DB::table('tbl_eventos_fixos')->insert([
            'id'=>4,
            'nome'=>"Grupo de oração semanal",
            'dados_horario_local'=>"Todas as quartas as 8 horas da manhã na igreja.",
            'id_igreja'=>1,
            'foto'=>"evento-4-1.jpg",
            'descricao'=>"Grupo que se reúne para orar na igreja toda quarta as 8:00 horas da manhã, aberto a todos que queiram participar, leve sua família!",
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>5,
            'nome'=>"Culto semanal",
            'dados_horario_local'=>"Todas as sextas as 19 horas na igreja.",
            'id_igreja'=>1,
            'foto'=>"evento-5-1.jpg",
            'descricao'=>null,
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>6,
            'nome'=>"Atendimento aos membros",
            'dados_horario_local'=>"Sábados das 14 ás 16 horas na igreja.",
            'id_igreja'=>1,
            'foto'=>null,
            'descricao'=>"Tempo que os pastores dedicam a atender os membros na igreja.",
        ]);

        DB::table('tbl_eventos_fixos')->insert([
            'id'=>7,
            'nome'=>"Grupo de oração semanal",
            'dados_horario_local'=>"Todas as quartas as 6 horas da manhã na igreja.",
            'id_igreja'=>2,
            'foto'=>"evento-7-2.jpg",
            'descricao'=>"Grupo que se reúne para orar na igreja toda quarta as 6:00 horas da manhã, aberto a todos que queiram participar, leve sua família!",
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>8,
            'nome'=>"Culto semanal",
            'dados_horario_local'=>"Todas as sextas as 18 horas na igreja.",
            'id_igreja'=>2,
            'foto'=>"evento-8-2.jpg",
            'descricao'=>null,
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>9,
            'nome'=>"Atendimento aos membros",
            'dados_horario_local'=>"Sábados das 13 ás 15 horas na igreja.",
            'id_igreja'=>2,
            'foto'=>null,
            'descricao'=>"Tempo que os pastores dedicam a atender os membros na igreja.",
        ]);

        DB::table('tbl_eventos_fixos')->insert([
            'id'=>10,
            'nome'=>"Grupo de jovens",
            'dados_horario_local'=>"Todos os domingos as 15 horas no parque da cidade.",
            'id_igreja'=>1,
            'foto'=>'evento-10-1.jpg',
            'descricao'=>"Jovens da igreja se reúnem para realizar dinâmicas e momentos de lazer.",
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>11,
            'nome'=>"Grupo de jovens",
            'dados_horario_local'=>"Todos os domingos as 15 horas no parque da cidade.",
            'id_igreja'=>2,
            'foto'=>'evento-11-2.jpg',
            'descricao'=>"Jovens da igreja se reúnem para realizar dinâmicas e momentos de lazer.",
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>12,
            'nome'=>"Grupo de jovens",
            'dados_horario_local'=>"Todos os domingos as 15 horas no parque da cidade.",
            'id_igreja'=>3,
            'foto'=>'evento-12-3.jpg',
            'descricao'=>"Jovens da igreja se reúnem para realizar dinâmicas e momentos de lazer.",
        ]);

        DB::table('tbl_eventos_fixos')->insert([
            'id'=>13,
            'nome'=>"Grupo de estudo bíblico",
            'dados_horario_local'=>"Todas as segundas as 19 horas no salão da escola Metodista.",
            'id_igreja'=>1,
            'foto'=>'evento-13-1.jpg',
            'descricao'=>"Grupo de estudo que realizar leituras, reflexões e depoimnentos sobre passagens da bíblia.",
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>14,
            'nome'=>"Grupo de estudo bíblico",
            'dados_horario_local'=>"Todas as segundas as 19 horas no salão da escola Metodista.",
            'id_igreja'=>2,
            'foto'=>'evento-14-2.jpg',
            'descricao'=>"Grupo de estudo que realizar leituras, reflexões e depoimnentos sobre passagens da bíblia.",
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>15,
            'nome'=>"Grupo de estudo bíblico",
            'dados_horario_local'=>"Todas as segundas as 19 horas no salão da escola Metodista.",
            'id_igreja'=>3,
            'foto'=>'evento-15-3.jpg',
            'descricao'=>"Grupo de estudo que realizar leituras, reflexões e depoimnentos sobre passagens da bíblia.",
        ]);
    }
}
