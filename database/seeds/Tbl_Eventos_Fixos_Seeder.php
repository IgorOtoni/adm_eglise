<?php

use Illuminate\Database\Seeder;

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
            'dados_horario'=>"Todas as quartas as 7 horas da manhã na igreja.",
            'id_igreja'=>3,
            'foto'=>"evento-1-3.jpg",
            'descricao'=>"Grupo que se reúne para orar na igreja toda quarta as 7:00 horas da manhã, aberto a todos que queiram participar, leve sua família!",
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>2,
            'nome'=>"Culto semanal",
            'dados_horario'=>"Todas as sextas as 20 horas na igreja.",
            'id_igreja'=>3,
            'foto'=>"evento-2-3.jpg",
            'descricao'=>null,
        ]);
        DB::table('tbl_eventos_fixos')->insert([
            'id'=>3,
            'nome'=>"Atendimento aos membros",
            'dados_horario'=>"Sábados das 13 ás 17 horas na igreja.",
            'id_igreja'=>3,
            'foto'=>null,
            'descricao'=>"Tempo que os pastores dedicam a atender os membros na igreja.",
        ]);
    }
}
