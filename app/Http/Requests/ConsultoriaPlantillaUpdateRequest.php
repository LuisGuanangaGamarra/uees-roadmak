<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultoriaPlantillaUpdateRequest extends FormRequest
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
            'id_consultoria' => 'required', 
            'id_plantilla' => 'required',
            //'subplantilla' => 'required',       JNI 25/04/2019
           // 'plantilla' => 'required|numeric',
           /*  'periodo' => 'required', */

            
        ];
    }
}
