<?php

namespace App\Console\Commands;

use App\Http\Services\Clientes\ServiceClientesCrud;
use Illuminate\Console\Command;

class CheckClientBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:ofertas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Chequea las fechas de cumpleaños de todos los clientes para enviar promociones';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ServiceClientesCrud $clientes)
    {
    }
}
