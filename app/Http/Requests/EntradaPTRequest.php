<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaPTRequest extends FormRequest
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
            'num_entrada'=> 'required|string|max:10|unique:entrada__productos__terminados,numero_entrada',
            'usuarioT' => 'required',
            'produccion' => 'required',
            'maquilero' => 'required',
            // 'sku' => 'required',
            'clasificacion' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'num_entrada.required'=> 'El campo FACTURA/REQUSICIÓN es obligatorio.',
            'num_entrada.max'=> 'El campo FACTURA/REQUSICIÓN no puede exceder los 10 caracteres.',
            'num_entrada.unique'=> 'El campo FACTURA/REQUSICIÓN esta duplicado.',
            'usuarioT.required' => 'El campo NOMBRE DE QUIÉN RECIBE es obligatorio.',
            'produccion.required' => 'El campo TIPO DE PRODUCCIÓN es obligatorio.', 
            'maquilero.required' => 'El campo MAQUILERO es obligatorio.', 
            'sku.required' => 'El campo SKU/MODELO es obligatorio',
            'clasificacion.required' => 'El campo CLASIFICACIÓN es obligatorio'
        ];
    }
}
