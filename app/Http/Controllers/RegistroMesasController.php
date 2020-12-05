<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroMesasRequest;
use App\Http\Services\RegistroMesas\ServiceRegistroMesas;

class RegistroMesasController extends Controller
{
    public function __construct(ServiceRegistroMesas $serviceRegistroMesas)
    {
        $this->serviceRegistroMesas = $serviceRegistroMesas;
    }
    public function getAllRegistrosMesasJson()
    {
        return $this->serviceRegistroMesas->getAllRegistrosMesasJson();
    }
    public function storeRegistroMesa(RegistroMesasRequest $request)
    {
        return $this->serviceRegistroMesas->store($request->validated());
    }
    public function updateRegistroMesa($id ,RegistroMesasRequest $request)
    {  
        return $this->serviceRegistroMesas->updateRegistroMesa($id , $request->validated());
    }
    public function deleteRegistroMesa($id)
    {
        return $this->serviceRegistroMesas->deleteRegistroMesa($id);
    }
}
