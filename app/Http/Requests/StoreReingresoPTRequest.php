<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReingresoPTRequest extends FormRequest
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
             'skuReingresos' => 'required',
             'clasificacionReingreso' => 'required',
            // 'tipoReingreso' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'num_requisicion.required' => 'El campo ORDEN DE REQUISICIÓN es obligatorio',
            'num_requisicion.max' => 'El campo ORDEN DE REQUISICIÓN debe ser de maximo 15 caracteres.',

            'skuReingresos.required' => 'El campo SKU/MODELO es obligatorio.',
            'clasificacionReingreso.required' => 'El campo CLASIFICACIÓN es obligatorio.',
            'tipoReingreso.required' => 'El campo TIPO DE PRODUCTO es obligatorio.',
        ];

    }
}
