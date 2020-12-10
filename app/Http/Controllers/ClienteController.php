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
        return ClientesResource::collection($this->cliente->getAllClientesJson());
    }
    public function store(ClienteRequest $request)
    {
        $this->cliente->storeCliente($request->validated());
        return $this->getAllClientes();
    }  
    public function update(ClienteRequest $request, int $id)
    {  
        $this->cliente->updateCliente($request->validated(),$id);
        return $this->getAllClientes();;
    }
    public function destroy(int $id)
    {
        $this->cliente->destroyCliente($id);
        return $this->getAllClientes();;
    }
}
