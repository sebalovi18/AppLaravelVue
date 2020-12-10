<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroMesasRequest;
use App\Http\Resources\RegistroMesasResource;
use App\Services\RegistroMesas\ServiceRegistroMesas;

class RegistroMesasController extends Controller
{
    public function __construct(ServiceRegistroMesas $serviceRegistroMesas)
    {
        $this->serviceRegistroMesas = $serviceRegistroMesas;
    }
    public function getAllRegistrosMesas()
    {
        return RegistroMesasResource::collection($this->serviceRegistroMesas->getAllRegistrosMesas());
    }
    public function store(RegistroMesasRequest $request)
    {
        $this->serviceRegistroMesas->store($request->validated());
        return $this->getAllRegistrosMesas();
    }
    public function update($id ,RegistroMesasRequest $request)
    {  
        $this->serviceRegistroMesas->updateRegistroMesa($id , $request->validated());
        return $this->getAllRegistrosMesas();
    }
    public function delete($id)
    {
        $this->serviceRegistroMesas->deleteRegistroMesa($id);
        return $this->getAllRegistrosMesas();
    }
}
