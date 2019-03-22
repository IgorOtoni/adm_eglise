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
            'nome'=>'Template padrão',
            'pasta'=>'template-padrao',
        ]);
    }
}
