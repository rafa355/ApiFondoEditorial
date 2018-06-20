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
	        'id' => 1,
	        'nombre' => 'Cliente',	       
      	]);

      	SolicitanteType::create([
	        'id' => 2,
	        'nombre' => 'Usuario',	       
      	]);
    }
}
