<?php

namespace App\Console\Commands;

use App\Services\Emails\ServiceEnvioMails;
use Illuminate\Console\Command;

class MailBirthdayOffers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:offers';

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
    public function handle(ServiceEnvioMails $serviceEmail)
    {
        $serviceEmail->enviarPromosSemanales();
    }
}
