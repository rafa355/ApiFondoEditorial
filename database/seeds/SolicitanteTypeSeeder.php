<?php

use Illuminate\Database\Seeder;
use App\Modelos\SolicitanteType;

class SolicitanteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SolicitanteType::create([
	        'nombre' => 'Cliente',	       
      	]);

      	SolicitanteType::create([
	        'nombre' => 'Usuario',	       
      	]);
    }
}
