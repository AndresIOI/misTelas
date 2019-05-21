<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoTerminadoCreateRequest extends FormRequest
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
            //
            'SKU' => 'required|string|unique:producto__terminados|max:13',
            'clasificacion_id' => 'required',
            'tipo_id' => 'required',
            'descripcion' => 'required|string',
            'precio_publico' => 'required|numeric|min:1',
            'img' => 'required|mimes:jpeg,jpg,png,gif'
        ];
    }

    public function messages(){
        return [
            'SKU.required' => 'El campo SKU es obligatorio',
            'SKU.unique' => 'El SKU ya existe',
            'SKU.max' => 'El SKU no debe ser mayor que 13 caracteres.',
            'clasificacion_id.required' => 'El campo CLASIFICACION es obligatorio',
            'tipo_id.required' => 'El campo TIPO es obligatorio',
            'descripcion.required' => 'El campo DESCRIPCION es obligatorio',
            'precio_publico.required' => 'El campo PRECIO A PUBLICO es obligatorio',
            'precio_publico.min' => 'El campo debe de ser mayor que 0',
            'precio_publico.numeric' => 'El campo PRECIO A PUBLICO solo acepta numeros',
            'img.required' => 'El campo IMAGEN es obligatorio',
            'img.mimes' => 'El campo IMAGEN solo acepta formatos JPEG, JPG, PNG, GIF'  
        ];
    }
}
