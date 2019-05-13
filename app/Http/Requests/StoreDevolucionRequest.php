<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDevolucionRequest extends FormRequest
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
            'orden_compra'=> 'required|string|max:8|unique:devolucions,ordenCompra',
            't_tela' => 'required',
            'clave_tela' => 'required',
            'color' => 'required',
            'cantidadReingreso' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'orden_compra.required'=> 'El campo ORDEN DE COMPRA es obligatorio.',
            'orden_compra.max'=> 'El campo ORDEN DE COMPRA no puede ser mayor a 8 caracteres.',
            'orden_compra.unique'=> 'El campo ORDEN DE COMPRA ya fue previamente registrado.', 
            't_tela.required' => 'El campo TIPO DE TELA es obligatorio.',
            'clave_tela.required' => 'El campo CLAVE DE TELA es obligatorio.', 
            'color.required' => 'El campo COLOR es obligatorio.', 
            'cantidadReingreso.required' => 'El campo CANTIDAD DE LA DEVOLUCIÓN es obligatorio.', 
        ];
    }
}
