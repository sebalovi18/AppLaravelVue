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
    public function getAllRegistrosMesasJson()
    {
        return RegistroMesasResource::collection($this->registroModel->has('clientes')->orderBy('fecha' , 'desc')->get());
    }
    public function store($validated)
    {
        $this->registroModel->n_mesa = $validated['numMesa'];
        $this->registroModel->fecha = $validated['fecha_horario'];
        $this->registroModel->save();
        $this->registroModel->all()
                            ->last()
                            ->clientes()
                            ->attach($validated['clientes']);
        return $this->getAllRegistrosMesasJson();
    }
    public function updateRegistroMesa($id , $validated)
    {
        $registro = $this->registroModel->findOrFail($id);
        $registro->n_mesa = $validated['numMesa'];
        $registro->fecha = $validated['fecha_horario'];
        $registro->save();
        $registro->clientes()->sync($validated['clientes']);
        return $this->getAllRegistrosMesasJson();
    }
    public function deleteRegistroMesa($id)
    {
        $this->registroModel->findOrFail($id)->clientes()->detach();
        $this->registroModel->findOrFail($id)->delete();
        return $this->getAllRegistrosMesasJson();
    }
}