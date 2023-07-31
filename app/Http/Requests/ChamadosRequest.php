<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChamadosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string',
            'categoria_id' => 'required',
            'descricao' => 'required|string',
//            'user_id' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'titulo' => 'O campo titulo é obrigatório',
            'categoria_id' => 'O campo categoria precisa ser especificado',
            'descricao' => 'O campo descricao é obrigatório',
//            'user_id' => 'O Chamado precisa ter um usuário identificado'
        ];
    }
}
