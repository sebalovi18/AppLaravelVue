<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistroMesasResource extends JsonResource
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
            'numMesa'=>$this->n_mesa,
            'fecha'=>date('Y/m/d' , strtotime($this->fecha)),
            'horario'=>date('H:i:m' , strtotime($this->fecha)),
            'clientes'=>ClientesResource::collection($this->clientes)
        ];
    }
}
