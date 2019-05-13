<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalidaRequest extends FormRequest
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
            //'numRequisicion' => 'required|digits_between:1,9999',
            'piezas' => 'required',
            'clave_tela' => 'required',
            'piezas' => 'required|digits_between:1,9999',
            'color' => 'required',
            'cantidadSalida' => 'required',

        ];
    }
    public function messages()
    {
        return[
            'numRequisicion.required' => 'El campo NUMERO DE REQUISICIÓN es obligatorio.',
            'numRequisicion.between' =>'El campo NUMERO DE REQUISICIÓN tiene que estar entre 1 y 9999.',
            'numRequisicion.unique' => 'El campo NUMERO DE REQUISICIÓN ya esta anteriormente registrado.',

            't_tela.required' => 'El campo TIPO DE TELA es obligatorio',
            
            'piezas.required'=>'El campo NUMERO DE PIEZAS es obligatorio.',
            'piezas.between'=>'El campo NUMERO DE PIEZAS tiene que estar entre 1 y 9999.',

            'clave_tela.required' => 'El campo CLAVE DE TELA es obligatorio',

            'color.required' => 'El campo COLOR es obligatorio',

            'cantidadSalida.required' => 'El campo CANTIDAD DE SALIDA es obligatorio'



        ];
    }
}
