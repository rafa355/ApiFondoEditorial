<?php

use Illuminate\Database\Seeder;
use App\Modelos\ResponsableType;

class ResponsableTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResponsableType::create([
	        'id' => 1,
	        'nombre' => 'Diseñador',	       
      	]);

        }
}
