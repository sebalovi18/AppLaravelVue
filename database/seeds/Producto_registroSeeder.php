<?php

use App\Models\Producto_registro;
use Illuminate\Database\Seeder;

class Producto_registroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Producto_registro::class,100)->create();
    }
}
