<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalidaHabilitacionRequest extends FormRequest
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
            'numRequisicion'=>'required|string|max:15,numero_requisicion',
            'piezas' => 'required|min:1',
            'clasificacion' =>'required',
            'tipoHabilitacion' => 'required',
            'clavehabilitacion' => 'required',

        ];
    }
    public function messages()
    {
        return[

            'numRequisicion.required' => 'El campo ORDEN DE REQUISICIÓN es obligatorio.',
            //'numRequisicion.unique' => 'El campo ORDEN DE REQUISICIÓN ya esta anteriormente registrado.',
            'numRequisicion.max' => 'El campo ORDEN DE REQUISICIÓN DEBE SER MAXIMO DE 15 CARACTERES.',
            'piezas.required' => 'El campo PIEZAS es obligatorio',
            'piezas.min' => 'El campo PIEZAS deber NO puede ser menor a 1.',
            'clasificacion.required' => 'El campo CLASIFICACIÓN es obligatorio.',
            'tipoHabilitacion.required' => 'El campo TIPO DE HABILITACIÓN es obligatorio.',
            'clavehabilitacion.required' => 'El campo CLAVE DE HABILITACIÓN es obligatorio.'



        ];
    }
}
