<?php

namespace App\Http\Services\Emails;

use App\Http\Services\Clientes\ServiceClientesCrud;
use App\Mail\MailPromo;

class ServiceEnvioMails 
{
    public function __construct(ServiceClientesCrud $clienteService , MailPromo $mailable)
    {   
        $this->clienteService = $clienteService;
        $this->mailable = $mailable;
    }
    public function enviarPromosSemanales()
    {
        return $this->clienteService->getAllClientesBirthday();
    }
}
