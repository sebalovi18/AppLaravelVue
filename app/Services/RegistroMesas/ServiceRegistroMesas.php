<?php

namespace App\Services\RegistroMesas;

use App\Models\Registro;

class ServiceRegistroMesas
{
    public function __construct(Registro $registroModel)
    {
        $this->registroModel = $registroModel;
    }
    public function getAllRegistrosMesas()
    {
        return $this->registroModel->has('clientes')->orderBy('fecha' , 'desc')->get();
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
    }
    public function updateRegistroMesa($id , $validated)
    {
        $registro = $this->registroModel->findOrFail($id);
        $registro->n_mesa = $validated['numMesa'];
        $registro->fecha = $validated['fecha_horario'];
        $registro->save();
        $registro->clientes()->sync($validated['clientes']);
    }
    public function deleteRegistroMesa($id)
    {
        $this->registroModel->findOrFail($id)->clientes()->detach();
        $this->registroModel->findOrFail($id)->delete();
    }
}