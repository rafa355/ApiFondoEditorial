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
	        'nombre' => 'Libro',	       
      	]);

      	ProyectoType::create([
	        'nombre' => 'Revista',	       
      	]);

      	ProyectoType::create([
	        'nombre' => 'Triptico',	       
		  ]);
		  
		  ProyectoType::create([
	        'nombre' => 'Diptico',	       
      	]);

      	ProyectoType::create([
	        'nombre' => 'Pendones',	       
      	]);

      	ProyectoType::create([
	        'nombre' => 'Vallas',	       
		  ]);
		
		ProyectoType::create([
	        'nombre' => 'Marcalibros',	       
          ]);
    }
}
