<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntradaRequest extends FormRequest
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
            'num_entrada' => 'required|string|max:8|unique:entradas,num_entrada',
            'cve_factura' => 'required|string|max:8|unique:entradas,cve_factura',
            'OperarioRecepcion' => 'required|string|max:40',
            'usuarioCompras' => 'required|max:40',

            'clave_tela' => 'required',
            'color' => 'required',
            'cantidadTela' => 'required|digits_between:1,9999',
            'Rollos' => 'required|digits_between:1,9999',
            'anchoTela' => 'required|digits_between:1,250',             
            'precioUTela' => 'required|digits_between:1.00,999999.00'
        ];
    }

    public function messages()
    {
        return[
            'num_entrada.required' => 'El campo ORDEN DE COMPRA es obligatorio.',
            'num_entrada.max' =>'El campo ORDEN DE COMPRA no puede ser mayor a 8 caracteres.',
            'num_entrada.unique' => 'El campo ORDEN DE COMPRA ya esta registrado.',

            'cve_factura.required' => 'El campo CLAVE DE FACTURA es obligatorio.',
            'cve_factura.max' => 'El campo CLAVE DE FACTURA no puede ser mayor a 8 caracteres..',
            'cve_factura.unique' => 'El campo CLAVE DE FACTURA ya esta registrado.',
            
            'OperarioRecepcion.required' => 'El campo NOMBRE DE QUIEN RECIBE es obligatorio.',
            'OperarioRecepcion.max' => 'El campo NOMBRE DE QUIEN RECIBE no puede ser mayor a 40 caracteres.',

            'usuarioCompras.required' => 'El campo NOMBRE DE QUIEN ORDENÓ es obligatorio.',
            'usuarioCompras.max' => 'El campo NOMBRE DE QUIEN ORDENÓ no puede ser mayor a 40 caracteres.',

            'clave_tela.required' => 'El campo CLAVE DE TELA es obligatorio.',
            'color.required' => 'El campo COLOR es obligatorio.',

            'cantidadTela.required' => 'El campo CANTIDAD es obligatorio.',
            'cantidadTela.between' => 'El campo CANTIDAD debe estar entre 1 y 9999.',

            'Rollos.required' => 'El campo ROLLOS es obligatorio.',
            'Rollos.required' => 'El campo ROLLOS debe estar entre 1 y 9999.',

            'anchoTela.required' => 'El campo ANCHO DE TELA es obligatorio.',
            'anchoTela.required' => 'El campo ANCHO DE TELA debe estar entre 1 y 250 CM.',

            'precioUTela.required' => 'El campo PRECIO UNITARIO es obligatorio.',
            'precioUTela.required' => 'El campo PRECIO UNITARIO debe estar entre 1.00 y 999999.00.',  
        ];
    }
}
