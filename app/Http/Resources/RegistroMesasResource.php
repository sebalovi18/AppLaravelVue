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
            'numMesa'=>$this->n_mesa,
            'fecha'=>$this->fecha,
            'clientes'=>ClientesResource::collection($this->clientes)
        ];
    }
}
