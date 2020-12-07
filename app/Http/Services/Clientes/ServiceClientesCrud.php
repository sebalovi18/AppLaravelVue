<?php

namespace App\Http\Services\Clientes;

use App\Http\Resources\ClientesResource;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class ServiceClientesCrud
{
    private $validation_rules = [
        'nombre' => 'required|min:2|max:100',
        'apellido' => 'required|min:2|max:100',
        'dni' => 'required|min:2|max:100',
        'fnacimiento'=>'required|date',
        'domicilio' => 'required|min:2|max:100',
        'telefono' => 'required|min:2|max:100',
        'email'=>'required|email'
    ];

    private $validation_messages = [
        'required'=>'El campo :attribute es requerido',
        'min'=>'El campo :attribute debe contener mas de 2 caracteres',
        'max'=>'El campo :attribute no puede poseer mas de 100 caracteres',
        'date'=>'La :attribute ingresada debe ser una valida',
        'email'=>'El campo :attribute no es valido'
    ];

    private $validation_custom_attributes = [
        'nombre' => 'Nombre',
        'apellido' => 'Apellido',
        'dni' => 'DNI',
        'fnacimiento' => 'Fecha de nacimiento',
        'domicilio' => 'Domicilio',
        'telefono' => 'Telefono',
        'email' => 'Correo electronico'
    ];

    private $prueba_cliente = [
        'nombre'=>'Sebastian',
        'apellido'=>"Lovisolo",
        'dni'=>'35114737',
        'fnacimiento'=>'1990/04/26',
        'domicilio'=>'necochea 81',
        'telefono'=>'3364310167',
        'email'=>'sebalovi12@gmail.com'
    ];

    private $validator;

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

    public function prueba()
    {
        $this->validator = Validator::make($this->prueba_cliente,
                                           $this->validation_rules,
                                           $this->validation_messages ,
                                           $this->validation_custom_attributes);

        return $this->validator->errors();
    }
}
