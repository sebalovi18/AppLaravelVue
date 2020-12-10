<?php

namespace App\Services\Clientes;

use App\Models\Cliente;

class ServiceClientes
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
        return $this->cliente->all();
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
    //////////////////////////////////////////////////////////
    public function getAllClientesEmails()
    {
        return $this->cliente->pluck('fnacimiento');
    }
    public function getAllClientesBirthday()
    {
        return $this->cliente->whereMonth('fnacimiento' , date('m'))
                             ->where(function($query){
                                 $query->whereDay('fnacimiento' , date('d'));
                             })
                             ->get();
    }
}
