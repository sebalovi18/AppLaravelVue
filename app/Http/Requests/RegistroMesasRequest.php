<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroMesasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "numMesa"=>'required|numeric|min:1|max:99',
            "horario"=>'required|string|size:8',
            "dia"=>'required|string|min:8|max:10',
            'clientes.*.id' => 'required|numeric|min:1',
/*             'clientes.*.nombre' => 'required|min:2|max:100',
            'clientes.*.apellido' => 'required|min:2|max:100',
            'clientes.*.dni' => 'required|min:2|max:100',
            'clientes.*.domicilio' => 'required|min:2|max:100',
            'clientes.*.telefono' => 'required|min:2|max:100' */
        ];
    }
}
