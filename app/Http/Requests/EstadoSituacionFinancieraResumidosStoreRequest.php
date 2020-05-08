<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class EstadoSituacionFinancieraResumidosStoreRequest extends FormRequest
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
            'idconsultoria' => 'required|numeric',
            'name' => 'required', 
            'periodo1' => 'required',
            'periodo2' => 'required',
            'periodo3' => 'required',
        ];
    }
}
