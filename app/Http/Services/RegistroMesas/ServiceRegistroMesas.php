<?php

namespace App\Http\Services\RegistroMesas;

use App\Http\Services\Clientes\ServiceClientesCrud;
use App\Models\Registro;

class ServiceRegistroMesas
{
    public function __construct(ServiceClientesCrud $serviceCliente , Registro $registroModel)
    {
        $this->registroModel = $registroModel;
        $this->serviceCliente = $serviceCliente;
    }
    public function registrarMesa($validated)
    {
        return $validated['clientes'];
        $fullTime =  $validated['dia'] . ' ' . $validated['horario'];
        $this->registroModel->n_mesa = $validated['numMesa'];
        $this->registroModel->fecha = $fullTime;
        $this->registroModel->save();
    }
}