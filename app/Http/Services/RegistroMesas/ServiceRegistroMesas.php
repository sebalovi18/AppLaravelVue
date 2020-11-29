<?php

namespace App\Http\Services\RegistroMesas;

use App\Http\Resources\RegistroMesasResource;
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
        return RegistroMesasResource::collection($this->registroModel->has('clientes')->get());
        //return RegistroMesasResource::collection($this->registroModel->all());
        //return $this->registroModel->all();
    }
    public function getAllRegistrosMesasJson()
    {
        return RegistroMesasResource::collection($this->registroModel->has('clientes')->get());
    }
}