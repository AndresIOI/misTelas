<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReingresoHabilitacionRequest extends FormRequest
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
            'num_requisicion' => 'required|string|max:15',
            'clasificacion' => 'required',
            'tipoHabilitacion' => 'required',
            'clavehabilitacion' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'num_requisicion.required' => 'El campo ORDEN DE COMPRA es obligatorio',
            'num_requisicion.max' => 'El campo ORDEN DE COMPRA debe ser de maximo 15 caracteres.',
            'clasificacion.required' => 'El campo CLASIFICACIÓN es obligatorio.',
            'tipoHabilitacion.required' => 'El campo TIPO DE HABILITACIÓN es obligatorio.',
            'clavehabilitacion.required' => 'El campo CLAVE DE HABILITACIÓN es obligatorio.',
        ];

    }
}
