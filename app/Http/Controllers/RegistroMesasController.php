<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroMesasRequest;
use App\Http\Services\RegistroMesas\ServiceRegistroMesas;

class RegistroMesasController extends Controller
{
    public function __construct(ServiceRegistroMesas $serviceRegistroMesas)
    {
        $this->serviceRegistroMesas = $serviceRegistroMesas;
    }
    public function store(RegistroMesasRequest $request){
        return $this->serviceRegistroMesas->registrarMesa($request->validated());
    }
}
