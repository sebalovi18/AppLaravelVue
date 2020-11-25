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
    public function store($validated)
    {
        $fullTime =  $validated['dia'] . ' ' . $validated['horario']; //Buscar alternativa a esto
        $this->registroModel->n_mesa = $validated['numMesa'];
        $this->registroModel->fecha = $fullTime;
        $this->registroModel->save();
        $this->registroModel->all()->last()->clientes()->attach($validated['clientes']);
        return $this->registroModel->all();
    }
}