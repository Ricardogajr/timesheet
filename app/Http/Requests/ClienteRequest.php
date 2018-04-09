<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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

    public function messages(){

        return [
        'nome.required' => 'Nome é obrigatório!',
        'nome.max' => 'O Campo deve ter no maximo 255 caracteres',
        'nome.required' => 'Email é obrigatório!',
        'email.max' => 'O Campo Email deve ter no maximo 255 caracteres',
        'telefone.required' => 'Telefone é obrigatório!',
        'endereco.required' => 'Endereço é obrigatório!',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required',
            'endereco' => 'required',
        ];
    }
}
