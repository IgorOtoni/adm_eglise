<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Tbl_Perfis_Seeder::class); 
        $this->call(Tbl_User_Seeder::class);
        $this->call(Tbl_Modulos_Seeder::class);
        $this->call(Tbl_Permissoes_Seeder::class);
        $this->call(Tbl_Permissoes_Modulos_Seeder::class);
        $this->call(Tbl_Igrejas_Modulos_Seeder::class);
        $this->call(Tbl_Permissoes_Modulos_Perfis_Seeder::class);
        $this->call(Tbl_Igrejas_Seeder::class);
        $this->call(Tbl_Template_Seeder::class);
        $this->call(Tbl_Configuracao_Seeder::class);
        $this->call(Tbl_Eventos_Fixos_Seeder::class);
        $this->call(Tbl_Noticias_Seeder::class);
        $this->call(Tbl_Eventos_Seeder::class);
        $this->call(Tbl_Sermoes_Seeder::class);
        $this->call(Tbl_Galeria_Seeder::class);
        $this->call(Tbl_Fotos_Seeder::class);
    }
}
