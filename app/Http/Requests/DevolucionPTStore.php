<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevolucionPTStore extends FormRequest
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
            'factura' => 'required',

            'skuDevolucion' => 'required',
            'clasificacionDevolucion' => 'required',
            'tipoPDevolucion' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'factura.required' => 'El campo FACTURA/REQUISICIÓN es obligatorio',
            'skuDevolucion.required' => 'El campo SKU/MODELO es obligatorio.',
            'clasificacionDevolucion.required' => 'El campo CLASIFICACIÓN es obligatorio.',
            'tipoPDevolucion.required' => 'El campo TIPO DE PRODUCTO es obligatorio.',
        ];

    }
}
