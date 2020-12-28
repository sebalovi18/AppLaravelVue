<?php

namespace App\Services\Clientes;

use App\Models\Cliente;
use Exception;

class ServiceClientes
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    public function getAllClientes()
    {
        try {
            return $this->cliente->all();
        } catch (Exception $err) {
            abort(404, "Clientes no encontrados"); // o 400 ? o 412?
        }
    }
    public function getCliente(int $id)
    {
        try {
            return $this->cliente->find($id);
        } catch (Exception $err) {
            abort(404, "Cliente no encontrado"); // o 400 ? o 412?
        }
    }
    public function storeCliente($validated)
    {
        try {
            $this->cliente->create($validated);
        } catch (Exception $err) {
            abort(409, "Cliente ya existe");
        }
    }
    public function updateCliente($validated, int $id)
    {
        try {
            $this->cliente->find($id)->update($validated);
        } catch (Exception $err) {
            abort(422, "No se puede editar el cliente");
        }
    }
    public function destroyCliente(int $id)
    {
        try {
            $this->cliente->find($id)->delete();
        } catch (Exception $err) {
            abort(422, "No se pudo eliminar el cliente");
        }
    }
    public function getAllClientesBirthday()
    {
        try {
            return $this->cliente->whereMonth('fnacimiento', date('m'))
                ->where(
                    function ($query) {
                        $query->whereDay('fnacimiento', date('d'));
                    }
                )
                ->get();
        } catch (Exception $err) {
            abort(422, "No se pudo encontar clientes");
        }
    }
}
