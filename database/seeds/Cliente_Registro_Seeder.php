<?php

use App\Models\Cliente_Registro;
use Illuminate\Database\Seeder;

class Cliente_Registro_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cliente_Registro::class,50)->create();//borrar
    }
}
