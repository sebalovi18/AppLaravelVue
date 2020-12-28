<?php

namespace App\Services\RegistroMesas;

use App\Models\Registro;
use Exception;

class ServiceRegistroMesas
{
    public function __construct(Registro $registroModel)
    {
        $this->registroModel = $registroModel;
    }
    public function getAllRegistrosMesas()
    {
        try {
            return
                $this->registroModel->has('clientes')->orderBy('fecha', 'desc')
                ->get();
        } catch (Exception $err) {
            abort(404);
        }
    }
    public function store($validated)
    {
        try {
            $this->registroModel->n_mesa = $validated['numMesa'];
            $this->registroModel->fecha = $validated['fecha_horario'];
            $this->registroModel->save();
            $this->registroModel->clientes()
                ->attach($validated['clientes']);
        } catch (Exception $err) {
            abort(409);
        }
    }
    public function updateRegistroMesa($id, $validated)
    {
        try {
            $registro = $this->registroModel->find($id);
            $registro->n_mesa = $validated['numMesa'];
            $registro->fecha = $validated['fecha_horario'];
            $registro->save();
            $registro->clientes()->sync($validated['clientes']);
        } catch (Exception $err) {
            abort(422);
        }
    }
    public function deleteRegistroMesa($id)
    {
        try {
            $this->registroModel->find($id)->clientes()->detach();
            $this->registroModel->find($id)->delete();
        } catch (Exception $err) {
            abort(422);
        }
    }
}
