<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tbl_User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome'=>'Igor Otoni',
            'email'=>'igorotoni96@outlook.com',
            'id_perfil'=> 1,
            'password'=>bcrypt('123456'),
            'status'=> true,
        ]);
        DB::table('users')->insert([
            'nome'=>'Paulo Paixão',
            'email'=>'paulo.paixao@hotsystems.com.br',
            'id_perfil'=> 1,
            'password'=>bcrypt('123456'),
            'status'=> true,
        ]);
        DB::table('users')->insert([
            'nome'=>'Hadailton Carvalho',
            'email'=>'hadailton.carvalho@hotsystems.com.br',
            'id_perfil'=> 1,
            'password'=>bcrypt('123456'),
            'status'=> true,
        ]);

        DB::table('users')->insert([
            'nome'=>'Pastor',
            'email'=>'pastor@hotsystems.com.br',
            'id_perfil'=> 4,
            'id_membro'=>19,
            'password'=>bcrypt('123456'),
            'status'=> true,
        ]);
    }
}
