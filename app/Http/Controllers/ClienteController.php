<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Services\Clientes\ServiceClientesCrud;

class ClienteController extends Controller
{

    public function __construct(ServiceClientesCrud $cliente)
    {
        $this->cliente = $cliente;
    }
    public function index()
    {   
        return $this->cliente->getAllClientesJson();
    }
    public function store(ClienteRequest $request)
    {
        $this->cliente->storeCliente($request->validated());
        return $this->cliente->getAllClientesJson();
    }
    public function update(ClienteRequest $request, int $id)
    {  
        $this->cliente->updateCliente($request->validated(),$id);
        return $this->cliente->getAllClientesJson();
    }
    public function destroy(int $id)
    {
        $this->cliente->destroyCliente($id);
        return $this->cliente->getAllClientesJson();
    }

}
