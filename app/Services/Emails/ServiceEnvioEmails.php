<?php

namespace App\Services\Emails;

use App\Mail\EmailPromo;
use App\Services\Clientes\ServiceClientes;
use Illuminate\Mail\Mailer;

class ServiceEnvioMails
{
    public function __construct(
        ServiceClientes $clienteService,
        EmailPromo $mailPromo,
        Mailer $mailer
    ) {
        $this->clienteService = $clienteService;
        $this->mailPromo = $mailPromo;
        $this->mailer = $mailer;
    }
    public function enviarPromosSemanales()
    {
        $clientesBirthday_format = $this->clienteService->getAllClientesBirthday()
            ->map(
                function ($val) {
                    return [
                        'name' => $val->nombre,
                        'email' => $val->email
                    ];
                }
            );

        $this->mailer->to($clientesBirthday_format)->send($this->mailPromo);
    }
}
