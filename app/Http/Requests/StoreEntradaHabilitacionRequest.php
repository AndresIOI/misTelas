<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntradaHabilitacionRequest extends FormRequest
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
            'num_entrada'=>'required|string|max:15|unique:habilitacion_entradas,ordenCompra',
            'cve_factura'=> 'required|string|max:15|unique:habilitacion_entradas,claveFactura',
            'OperarioRecepcion'=>'required|max:40',
            'usuarioCompras'=>'required|max:40',
            'proveedor' => 'required',

            'clasificacion' => 'required',
            'tipoHabilitacion' => 'required',
            'clavehabilitacion' => 'required',
            //'empaqueHabilitacion' => 'required',
            //'CantidadUnidades' => 'required|digits_between:1,100000',
            //'PrecioU' => 'required|digits_between:0.1,250'
        ];
    }
        public function messages()
    {
        return[
            'num_entrada.required' => 'El campo ORDEN DE COMPRA es obligatorio.',
            'num_entrada.max' =>'El campo ORDEN DE COMPRA no puede ser mayor a 15 caracteres.',
            'num_entrada.unique' => 'El campo ORDEN DE COMPRA ya esta registrado.',
            'cve_factura.required' => 'El campo CLAVE DE FACTURA es obligatorio.',
            'cve_factura.max' => 'El campo CLAVE DE FACTURA no puede ser mayor a 15 caracteres..',
            'cve_factura.unique' => 'El campo CLAVE DE FACTURA ya esta registrado.',
            'OperarioRecepcion.required' => 'El campo NOMBRE DE QUIEN RECIBE es obligatorio.',
            'OperarioRecepcion.max' => 'El campo NOMBRE DE QUIEN RECIBE no puede ser mayor a 40 caracteres.',
            'usuarioCompras.required' => 'El campo NOMBRE DE QUIEN ORDENÓ es obligatorio.',
            'usuarioCompras.max' => 'El campo NOMBRE DE QUIEN ORDENÓ no puede ser mayor a 40 caracteres.',
            'proveedor.required' => 'El campo PROVEEDOR es obligatorio',
            'clasificacion.required' => 'El campo CLASIFICACIÓN es obligatorio.',
            'tipoHabilitacion.required' => 'El campo TIPO DE HABILITACIÓN es obligatorio.',
            'clavehabilitacion.required' => 'El campo CLAVE DE HABILITACIÓN es obligatorio.',

           // 'empaqueHabilitacion.required' => 'El campo EMPAQUE es obligatorio.',

            //'CantidadUnidades.required' => 'El campo CANTIDAD DE UNIDADES es obligatorio.',
            //'CantidadUnidades.required' => 'El campo CANTIDAD DE UNIDADES debe estar entre 1 y 100,000.',

           // 'PrecioU.required' => 'El campo PRECIO UNITARIO es obligatorio.',
            //'PrecioU.required' => 'El campo PRECIO UNITARIO debe estar entre 0.10 y 250.00.',  
        ];
    }
}
