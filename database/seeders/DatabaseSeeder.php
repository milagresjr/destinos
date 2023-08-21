<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $provi = ['Luanda','Lunda-Norte','Lunda-Sul','Bengo','Benguela','Bié','Huambo','Huila','Namibe',
        'Moxico','Kwanza-Norte','Kwanza-Sul','Cabinda','Cuando-Cubango','Zaire','Uige','Malanje','Cunene',];
        foreach ($provi as $key => $value) {
          
            \App\Models\Provincia::factory()->create([
                'nome' => $value,
                'descricao' => 'Descricao da provi..',
                'foto' => 'foto01.png'
            ]);

        }
         
    }
}
