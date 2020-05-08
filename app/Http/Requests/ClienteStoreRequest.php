<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteStoreRequest extends FormRequest
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
            'cedula_ruc' => 'required|unique:clientes,cedula_ruc',
            'nombre' => 'required',
            'apellidos' => 'required',
            'empresa' => 'required', 
            'direccion' => 'required',
            'ciudad' => 'required', 
            'telefono' => 'required', 
            'pais' => 'required'
        ];
    }
}
