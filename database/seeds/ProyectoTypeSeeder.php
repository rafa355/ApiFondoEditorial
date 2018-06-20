<?php

use Illuminate\Database\Seeder;
use App\Modelos\ProyectoType;

class ProyectoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProyectoType::create([
	        'id' => 1,
	        'nombre' => 'Libro',	       
      	]);

      	ProyectoType::create([
	        'id' => 2,
	        'nombre' => 'Revista',	       
      	]);

      	ProyectoType::create([
	        'id' => 3,
	        'nombre' => 'Triptico',	       
		  ]);
		  
		  ProyectoType::create([
	        'id' => 4,
	        'nombre' => 'Diptico',	       
      	]);

      	ProyectoType::create([
	        'id' => 5,
	        'nombre' => 'Pendones',	       
      	]);

      	ProyectoType::create([
	        'id' => 6,
	        'nombre' => 'Vallas',	       
		  ]);
		
		ProyectoType::create([
	        'id' => 7,
	        'nombre' => 'Marcalibros',	       
          ]);
    }
}
