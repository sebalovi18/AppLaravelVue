<?php

use App\Models\Cliente_Registro;
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
        $this->call(ClienteSeeder::class);
        $this->call(RegistroSeeder::class);
        $this->call(Cliente_Registro_Seeder::class);
        // $this->call(UserSeeder::class);
    }
}
