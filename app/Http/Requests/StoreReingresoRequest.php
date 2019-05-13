<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReingresoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
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
            //'num_requisicion' => 'required|digits_between:1,9999',
            't_tela' => 'required',
            'clave_tela' => 'required',
            'color' => 'required',
            'cantidadReingreso' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'num_requisicion.required' => 'El campo NUMERO DE REQUISICIÓN es obligatorio',
            'num_requisicion.between' => 'El campo NUMERO DE REQUISICIÓN debe de estar entre 1 y 9999',
            't_tela.required' => 'El campo TIPO DE TELA es obligatorio.',
            'clave_tela.required' => 'El campo CLAVE DE TELA es obligatorio.',
            'color.required' => 'El campo COLOR es obligatorio.',
            'cantidadReingreso.required' => 'El campo CANTIDAD DE REINGRESO es obligatorio.',
        ];

    }
}
