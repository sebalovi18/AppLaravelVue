<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Resources\ClientesResource;
use App\Services\Clientes\ServiceClientes;

class ClienteController extends Controller
{
    public function __construct(ServiceClientes $cliente)
    {
        $this->cliente = $cliente;
    }
    public function getAllClientes()
    {
        return
            response(
                ClientesResource::collection($this->cliente->getAllClientes()),
                200
            );
    }
    public function store(ClienteRequest $request)
    {
        $this->cliente->storeCliente($request->validated());
        return
            response(
                "Cliente creado",
                201
            );
    }
    public function update(ClienteRequest $request, int $id)
    {
        $this->cliente->updateCliente($request->validated(), $id);
        return
            response(
                "Cliente actualizado",
                201
            );
    }
    public function destroy(int $id)
    {
        $this->cliente->destroyCliente($id);
        return
            response(
                "Cliente eliminado",
                204
            );
    }
}
