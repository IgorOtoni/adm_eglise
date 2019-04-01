<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tbl_Igrejas_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Primeira Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'rua' => '7',
            'num'=> '230',
            'cep'=> '35.181-018',
            'logo'=> 'logo-igreja-1.jpg',
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Segunda Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'rua' => '7',
            'complemento' => 'Galpão',
            'num'=>'230',
            'cep'=>'35.181-018',
            'logo'=> 'logo-igreja-2.jpg',
            'telefone'=>'(99) 99999-9999',
            'email' => 'segundaiba@eglise.com'
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Terceira Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'rua' => '7',
            'num'=>'230',
            'cep'=>'35.181-018',
            'email' => 'terceira@eglise.com'
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Quarta Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'rua' => '7',
            'complemento' => 'Galpão',
            'num'=>'230',
            'cep'=>'35.181-018',
            'logo'=> 'logo-igreja-3.jpg',
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Quinta Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'rua' => '7',
            'complemento' => 'Galpão',
            'num'=>'230',
            'cep'=>'35.181-018',
            'logo'=> 'logo-igreja-4.jpg',
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Sexta Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'rua' => '7',
            'num'=>'230',
            'cep'=>'35.181-018',
            'telefone'=>'(99) 99999-9999',
        ]);
        DB::table('tbl_igrejas')->insert([
            'nome'=>'Sétima Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'rua' => '7',
            'complemento' => 'Galpão',
            'num'=>'230',
            'cep'=>'35.181-018',
        ]);DB::table('tbl_igrejas')->insert([
            'nome'=>'Oitava Igreja Batista',
            'estado' => 'MG',
            'cidade' => 'Timóteo',
            'bairro' => 'Alegre',
            'rua' => '7',
            'complemento' => 'Galpão',
            'num'=>'230',
            'cep'=>'35.181-018',
            'telefone'=>'(99) 99999-9999',
        ]);
    }
}
