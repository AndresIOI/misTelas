<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelaCreateRequest extends FormRequest
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
            //
            'clave' => 'required|string',
            'descripcion' => 'required|string',
            'tipo_id' => 'required',
            'unidad' => 'required'
        ];
    }

    public function messages(){
        return [
            'clave.required' => 'El campo CLAVE es obligatorio.',
            'descripcion.required' => 'El campo DESCRIPCION es obligatorio.',
            'tipo_id.required' => 'El campo TIPO es obligatorio.',
            'unidad.required' => 'El campo UNIDAD es obligatorio.' 
        ];
    }
}
