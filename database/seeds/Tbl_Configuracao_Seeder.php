<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tbl_Configuracao_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_configuracoes')->insert([
            'id'=>1,
            'id_igreja'=>1,
            'id_template'=>2,
            'url'=>'primeiraiba',
            'facebook'=>'http://www.facebook.com/profile/primeiraIgrejaBatista',
            'twitter'=>'http://www.twitter.com/profile/primeiraIgrejaBatista',
            'texto_apresentativo'=>"A visão da nossa igreja está pautada em sentimentos que Deus foi colocando ao longo do tempo no coração de sua liderança. Queremos ser uma igreja que cresce em direção a Deus, num compromisso sério com Ele, buscando conhecê-Lo na Sua intimidade, poder, Graça e em Sua força. E por isso todo ministério está pautado na Palavra de Deus, na exposição bíblica, numa visão de mobilização de todo povo de Deus, à intercessão e ao discipulado.
            O segundo aspecto desta visão é um crescimento para fora, no sentido de ser uma igreja contextualizada, que faz diferença na comunidade e que penetra em todos os campos da sociedade, deixando a marca do sal e da luz do Senhor Jesus. Por isso queremos fazer Jesus conhecido de todos os povos, de todas as pessoas e queremos servir ao nosso semelhante demonstrando o poder e o amor do Senhor Jesus de modo prático.
            O terceiro aspecto desta visão é quando nós olhamos prá dentro, e ao mesmo tempo que queremos ser essa igreja que tem uma intensa busca espiritual e uma missão muito forte dentro do coração de cada membro, desejamos ser também uma igreja comunidade, uma igreja família, uma igreja que olha uns para os outros, e que se relaciona com intensidade e amor.",
        ]);

        DB::table('tbl_configuracoes')->insert([
            'id'=>2,
            'id_igreja'=>2,
            'id_template'=>3,
            'url'=>'segundaiba',
            'twitter'=>'http://www.twitter.com/profile/primeiraIgrejaBatista',
            'youtube'=>'http://www.youtube.com/profile/primeiraIgrejaBatista',
            'texto_apresentativo'=>"A visão da nossa igreja está pautada em sentimentos que Deus foi colocando ao longo do tempo no coração de sua liderança. Queremos ser uma igreja que cresce em direção a Deus, num compromisso sério com Ele, buscando conhecê-Lo na Sua intimidade, poder, Graça e em Sua força. E por isso todo ministério está pautado na Palavra de Deus, na exposição bíblica, numa visão de mobilização de todo povo de Deus, à intercessão e ao discipulado.
            O segundo aspecto desta visão é um crescimento para fora, no sentido de ser uma igreja contextualizada, que faz diferença na comunidade e que penetra em todos os campos da sociedade, deixando a marca do sal e da luz do Senhor Jesus. Por isso queremos fazer Jesus conhecido de todos os povos, de todas as pessoas e queremos servir ao nosso semelhante demonstrando o poder e o amor do Senhor Jesus de modo prático.
            O terceiro aspecto desta visão é quando nós olhamos prá dentro, e ao mesmo tempo que queremos ser essa igreja que tem uma intensa busca espiritual e uma missão muito forte dentro do coração de cada membro, desejamos ser também uma igreja comunidade, uma igreja família, uma igreja que olha uns para os outros, e que se relaciona com intensidade e amor.",
        ]);

        DB::table('tbl_configuracoes')->insert([
            'id'=>3,
            'id_igreja'=>3,
            'url'=>'terceiraiba',
            'twitter'=>'http://www.twitter.com/profile/primeiraIgrejaBatista',
            'youtube'=>'http://www.youtube.com/profile/primeiraIgrejaBatista',
            'texto_apresentativo'=>"A visão da nossa igreja está pautada em sentimentos que Deus foi colocando ao longo do tempo no coração de sua liderança. Queremos ser uma igreja que cresce em direção a Deus, num compromisso sério com Ele, buscando conhecê-Lo na Sua intimidade, poder, Graça e em Sua força. E por isso todo ministério está pautado na Palavra de Deus, na exposição bíblica, numa visão de mobilização de todo povo de Deus, à intercessão e ao discipulado.
            O segundo aspecto desta visão é um crescimento para fora, no sentido de ser uma igreja contextualizada, que faz diferença na comunidade e que penetra em todos os campos da sociedade, deixando a marca do sal e da luz do Senhor Jesus. Por isso queremos fazer Jesus conhecido de todos os povos, de todas as pessoas e queremos servir ao nosso semelhante demonstrando o poder e o amor do Senhor Jesus de modo prático.
            O terceiro aspecto desta visão é quando nós olhamos prá dentro, e ao mesmo tempo que queremos ser essa igreja que tem uma intensa busca espiritual e uma missão muito forte dentro do coração de cada membro, desejamos ser também uma igreja comunidade, uma igreja família, uma igreja que olha uns para os outros, e que se relaciona com intensidade e amor.",
        ]);

        DB::table('tbl_configuracoes')->insert([
            'id'=>4,
            'id_igreja'=>4,
            'url'=>'quartaiba',
            'twitter'=>'http://www.twitter.com/profile/qurataIgrejaBatista',
            'youtube'=>'http://www.youtube.com/profile/quartaIgrejaBatista',
            'texto_apresentativo'=>"A visão da nossa igreja está pautada em sentimentos que Deus foi colocando ao longo do tempo no coração de sua liderança. Queremos ser uma igreja que cresce em direção a Deus, num compromisso sério com Ele, buscando conhecê-Lo na Sua intimidade, poder, Graça e em Sua força. E por isso todo ministério está pautado na Palavra de Deus, na exposição bíblica, numa visão de mobilização de todo povo de Deus, à intercessão e ao discipulado.
            O segundo aspecto desta visão é um crescimento para fora, no sentido de ser uma igreja contextualizada, que faz diferença na comunidade e que penetra em todos os campos da sociedade, deixando a marca do sal e da luz do Senhor Jesus. Por isso queremos fazer Jesus conhecido de todos os povos, de todas as pessoas e queremos servir ao nosso semelhante demonstrando o poder e o amor do Senhor Jesus de modo prático.
            O terceiro aspecto desta visão é quando nós olhamos prá dentro, e ao mesmo tempo que queremos ser essa igreja que tem uma intensa busca espiritual e uma missão muito forte dentro do coração de cada membro, desejamos ser também uma igreja comunidade, uma igreja família, uma igreja que olha uns para os outros, e que se relaciona com intensidade e amor.",
        ]);

        DB::table('tbl_configuracoes')->insert([
            'id'=>5,
            'id_igreja'=>5,
        ]);

        DB::table('tbl_configuracoes')->insert([
            'id'=>6,
            'id_igreja'=>6,
        ]);

        DB::table('tbl_configuracoes')->insert([
            'id'=>7,
            'id_igreja'=>7,
        ]);

        DB::table('tbl_configuracoes')->insert([
            'id'=>8,
            'id_igreja'=>8,
        ]);

    }
}
