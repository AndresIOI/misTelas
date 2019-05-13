<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalidaTerminadosRequest extends FormRequest
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
            'numRequisicion'=>'required|string|max:15|unique:salida_producto_terminados,numero_requisicion',
            'usuario_ordenS' => 'required',
            'tipoSalida' =>'required',
            // 'skuSalida' => 'required',
            'clasificacion' => 'required',

        ];
    }
    public function messages()
    {
        return[
            'numRequisicion.required' => 'El campo REMISIÓN/REQUISICIÓN es obligatorio.',
            'numRequisicion.unique' => 'El campo REMISIÓN/REQUISICIÓN ya esta anteriormente registrado.',
            'numRequisicion.max' => 'El campo REMISIÓN/REQUISICIÓN DEBE SER MAXIMO DE 15 CARACTERES.',
            'usuario_ordenS.required' => 'El campo NOMBRE DE QUIEN ORDENO LA SALIDA es obligatorio',
            'tipoSalida.required' => 'El campo TIPO DE SALIDA es obligatorio.',
            'skuSalida.required'=>'El campo SKU/MODELO es obligatorio',
            'clasificacion.required' => 'El campo CLASIFICACION es obligatorio',
        ];
    }
}
