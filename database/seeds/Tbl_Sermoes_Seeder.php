<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class Tbl_Sermoes_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_sermoes')->insert([
            'id'=>1,
            'nome'=>"Sermão da páscoa do pastor Invi.",
            'id_igreja'=>3,
            'link'=>"http://player.vimeo.com/video/19564018",
            'descricao'=>"Sermão do dia 21 de abril de 2019 do pastor Invi realizado na igreja no culto das 20 horas.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-20),
        ]);
        DB::table('tbl_sermoes')->insert([
            'id'=>2,
            'nome'=>"Sermão do natal do pastor X.",
            'id_igreja'=>3,
            'link'=>"https://www.youtube.com/embed/WhCEtmFo9Ek",
            'descricao'=>"Sermão do dia 25 de dezembrpo de 2019 do pastor X realizado no igreja no culto das 20 horas.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-30),
        ]);
        DB::table('tbl_sermoes')->insert([
            'id'=>3,
            'nome'=>"Sermão do serpé.",
            'id_igreja'=>3,
            'link'=>"http://player.vimeo.com/video/19564018?title=0&amp;byline=0&autoplay=0&amp;color=007F7B",
            'descricao'=>"Sermão que explica que o contrário do sermão é serpé, realizado pelo pastor sabe tudo no dia dos bobo, as nunca e meia da madrugada.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
        ]);
        DB::table('tbl_sermoes')->insert([
            'id'=>4,
            'nome'=>"Apresentação da plataforma Église.",
            'id_igreja'=>3,
            'link'=>"http://www.dailymotion.com/embed/video/x287jnw",
            'descricao'=>"Audio do curso sobre a utilização da plataforma Église, dia W do mês X de Y as Z horas.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
        ]);

        DB::table('tbl_sermoes')->insert([
            'id'=>5,
            'nome'=>"Sermão da páscoa do pastor Invi.",
            'id_igreja'=>1,
            'link'=>"http://player.vimeo.com/video/19564018",
            'descricao'=>"Sermão do dia 21 de abril de 2019 do pastor Invi realizado na igreja no culto das 20 horas.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-20),
        ]);
        DB::table('tbl_sermoes')->insert([
            'id'=>6,
            'nome'=>"Sermão do natal do pastor X.",
            'id_igreja'=>1,
            'link'=>"https://www.youtube.com/embed/WhCEtmFo9Ek",
            'descricao'=>"Sermão do dia 25 de dezembrpo de 2019 do pastor X realizado no igreja no culto das 20 horas.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-30),
        ]);
        DB::table('tbl_sermoes')->insert([
            'id'=>7,
            'nome'=>"Sermão do serpé.",
            'id_igreja'=>1,
            'link'=>"http://player.vimeo.com/video/19564018?title=0&amp;byline=0&autoplay=0&amp;color=007F7B",
            'descricao'=>"Sermão que explica que o contrário do sermão é serpé, realizado pelo pastor sabe tudo no dia dos bobo, as nunca e meia da madrugada.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
        ]);
        DB::table('tbl_sermoes')->insert([
            'id'=>8,
            'nome'=>"Apresentação da plataforma Église.",
            'id_igreja'=>1,
            'link'=>"http://www.dailymotion.com/embed/video/x287jnw",
            'descricao'=>"Audio do curso sobre a utilização da plataforma Église, dia W do mês X de Y as Z horas.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
        ]);

        DB::table('tbl_sermoes')->insert([
            'id'=>9,
            'nome'=>"Sermão da páscoa do pastor Invi.",
            'id_igreja'=>2,
            'link'=>"http://player.vimeo.com/video/19564018",
            'descricao'=>"Sermão do dia 21 de abril de 2019 do pastor Invi realizado na igreja no culto das 20 horas.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-20),
        ]);
        DB::table('tbl_sermoes')->insert([
            'id'=>10,
            'nome'=>"Sermão do natal do pastor X.",
            'id_igreja'=>2,
            'link'=>"https://www.youtube.com/embed/WhCEtmFo9Ek",
            'descricao'=>"Sermão do dia 25 de dezembrpo de 2019 do pastor X realizado no igreja no culto das 20 horas.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-30),
        ]);
        DB::table('tbl_sermoes')->insert([
            'id'=>11,
            'nome'=>"Sermão do serpé.",
            'id_igreja'=>2,
            'link'=>"http://player.vimeo.com/video/19564018?title=0&amp;byline=0&autoplay=0&amp;color=007F7B",
            'descricao'=>"Sermão que explica que o contrário do sermão é serpé, realizado pelo pastor sabe tudo no dia dos bobo, as nunca e meia da madrugada.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-40),
        ]);
        DB::table('tbl_sermoes')->insert([
            'id'=>12,
            'nome'=>"Apresentação da plataforma Église.",
            'id_igreja'=>2,
            'link'=>"http://www.dailymotion.com/embed/video/x287jnw",
            'descricao'=>"Audio do curso sobre a utilização da plataforma Église, dia W do mês X de Y as Z horas.",
            'created_at'=>Carbon::parse(date('Y-m-d h:i:s', time()))->addHour(-50),
        ]);
    }
}
