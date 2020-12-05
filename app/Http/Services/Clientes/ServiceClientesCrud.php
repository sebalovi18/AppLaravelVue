<?php

namespace App\Http\Services\Clientes;

use App\Http\Resources\ClientesResource;
use App\Models\Cliente;

class ServiceClientesCrud
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    public function getAllClientes()
    {
        return $this->cliente->all();
    }
    public function getAllClientesJson()
    {
        //return json_encode($this->cliente->all());
        return ClientesResource::collection($this->cliente->all());
    }
    public function getCliente(int $id){
        return $this->cliente->find($id);
    }
    public function storeCliente($validated)
    {
        $this->cliente->create($validated);
    }
    public function updateCliente($validated ,int $id)
    {  
        $this->cliente->findOrFail($id)->update($validated);
    }
    public function destroyCliente(int $id)
    {
        $this->cliente->findOrFail($id)->delete();
    }
    
}
