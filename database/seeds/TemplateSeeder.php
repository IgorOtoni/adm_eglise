<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_templates')->insert([
            'nome'=>'Template padrão 1',
            'pasta'=>'template-padrao',
        ]);

        DB::table('tbl_templates')->insert([
            'nome'=>'Template padrão 2',
            'pasta'=>'template-padrao',
        ]);

        DB::table('tbl_templates')->insert([
            'nome'=>'Template padrão 3',
            'pasta'=>'template-padrao',
        ]);
    }
}
