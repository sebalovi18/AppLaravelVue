<?php

namespace App\Http\Services\Emails;

use App\Http\Services\Clientes\ServiceClientesCrud;
use App\Mail\EmailPromo;
use Illuminate\Support\Facades\Mail;

class ServiceEnvioMails 
{
    public function __construct(ServiceClientesCrud $clienteService , EmailPromo $mailable)
    {   
        $this->clienteService = $clienteService;
        $this->mailable = $mailable;
    }
    public function enviarPromosSemanales()
    {
        $clientesBirthday_format = $this->clienteService->getAllClientesBirthday()
                                                        ->map(function($val){
                                                            return [
                                                                'name'=>$val->nombre,
                                                                'email'=>$val->email
                                                            ];
                                                        });

        Mail::to($clientesBirthday_format)->send($this->mailable);
    }
}
