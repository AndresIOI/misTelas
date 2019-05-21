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

            'sku' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'factura.required' => 'El campo FACTURA/REQUISICIÓN es obligatorio',
            'sku.required' => 'NO ha seleccionado ningun PRODUCTO.',
        ];

    }
}
