<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubConsultoriasUpdateRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required', 
            'grupo' => 'required', 
            'req_indice' => 'required', 
            'precio' => 'required', 
            'estado' => 'required'
        ];
    }
}
