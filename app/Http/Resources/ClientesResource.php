<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'nombre'=>$this->nombre,
            'apellido'=>$this->apellido,
            'dni'=>$this->dni,
            'fnacimiento'=>date('Y-m-d' , strtotime($this->fnacimiento)),
            'telefono'=>$this->telefono,
            'domicilio'=>$this->domicilio,
            'email'=>$this->email
        ];
    }
}
