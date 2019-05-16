<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabilitacionCreateRequest extends FormRequest
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
            'clave' => 'required|string|unique:habilitacions,clave',
            'descripcion' => 'required|string',
            'tipo_id' => 'required|string',
            'unidad' => 'required|string'
        ];
    }

    public function messages(){
        return [
            'clave.required' => 'El campo CLAVE es obligatorio.',
            'clave.unique' => 'El nombre de la CLAVE ya existe.',
            'descripcion.required' => 'El campo DESCRIPCION es obligarotio,',
            'tipo_id.required' => 'El campo TIPO es obligatorio.',
            'unidad.required' => 'El campo UNIDAD es obligaorio.'  
        ];
    }
}
