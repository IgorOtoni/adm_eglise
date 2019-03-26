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
        $this->call(UserSeeder::class);
        $this->call(Tbl_Modulos_Seeder::class);
        $this->call(Tbl_Igrejas_Seeder::class);
        $this->call(TemplateSeeder::class);
        $this->call(ConfiguracaoSeeder::class);
        $this->call(Tbl_Igrejas_Modulos::class);
    }
}
