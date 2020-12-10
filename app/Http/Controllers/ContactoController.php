<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoFormRequest;
use App\Services\ContactoForm\ServiceContacto;

class ContactoController extends Controller
{

    public function __construct(ServiceContacto $service_contacto)
    {
        $this->service_contacto = $service_contacto;
    }

    public function automaticFormResponse(ContactoFormRequest $request){
        $this->service_contacto->automaticFormResponse($request);
    }
}
