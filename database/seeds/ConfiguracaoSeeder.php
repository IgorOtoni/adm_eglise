<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ConfiguracaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_configuracoes')->insert([
            'id_igreja'=>1,
            'id_template'=>2,
            'url'=>'primeiraiba',
        ]);

        DB::table('tbl_configuracoes')->insert([
            'id_igreja'=>2,
            'id_template'=>3,
            'url'=>'segundaiba',
        ]);

        DB::table('tbl_configuracoes')->insert([
            'id_igreja'=>3,
            'url'=>'terceiraiba',
        ]);
    }
}
