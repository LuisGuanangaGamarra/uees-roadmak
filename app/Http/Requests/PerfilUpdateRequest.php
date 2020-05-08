<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilUpdateRequest extends FormRequest
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
        $rules = [
            'name'=>'required',
            'lastname'=>'required',
            'email'=>'required|unique:users,email,'.$this->usuario,
            'file' => 'mimes:jpeg,bmp,png',
        ];

        // if($this->get('file')){
        //     $rules = array_merge($rules, ['file' => 'mimes:jpeg,bmp,png']);
        // }

        return $rules;
    }
}
