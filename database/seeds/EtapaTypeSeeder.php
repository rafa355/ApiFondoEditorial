<?php

use Illuminate\Database\Seeder;
use App\Modelos\EtapaProyectoType;

class EtapaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EtapaProyectoType::create([
	        'id' => 1,
	        'nombre' => 'Preliminar',	       
      	]);

      	EtapaProyectoType::create([
	        'id' => 2,
	        'nombre' => 'Diagramacion',	       
      	]);

      	EtapaProyectoType::create([
	        'id' => 3,
	        'nombre' => 'Revision y Correccion',	       
		  ]);
		
		EtapaProyectoType::create([
	        'id' => 4,
	        'nombre' => 'Publicacion',	       
          ]);
    }
}
