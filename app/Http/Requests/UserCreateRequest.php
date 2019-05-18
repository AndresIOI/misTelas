<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'tipo' => 'required'            
        ];
    }

    public function messages(){
        return[
            'name.required' => 'El campo NOMBRE es obligatorio',
            'username.required' => 'El campo USERNAME es obligatorio',
            'username.unique' => 'Ya existe un registro con ese USERNAME',
            'email.required' => 'El campo EMAIL es obligatorio',
            'email.unique' => 'Ya existe un registro con ese EMAIL',
            'tipo.required' => 'El campo TIPO es obligatorio',
            'password.required' => 'El campo PASSWORD es obligatorio',
            'password.min' => 'El PASSWORD debe tener minimo 6 caracteres',
            'password.confirmed' => 'El PASSWORD no coincide'
        ];
        

    }
}
