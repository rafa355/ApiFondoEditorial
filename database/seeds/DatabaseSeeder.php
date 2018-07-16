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
        //$this->call(UsersTableSeeder::class);
        $this->call(EtapaTypeSeeder::class);
        $this->call(ProyectoTypeSeeder::class);
        $this->call(ResponsableTypeSeeder::class);
        $this->call(SolicitanteTypeSeeder::class);
        $this->call(SolicitanteSeeder::class);
    }
}
