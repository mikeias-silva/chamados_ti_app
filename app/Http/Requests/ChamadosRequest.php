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
        return false;
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
            'prazo_solucao' => 'required|date',
            'situacao' => 'required',
            'data_criacao' => 'required|date',
            'data_solucao' => 'date',
            'user_id' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'titulo' => 'O campo titulo é obrigatório',
            'categoria_id' => 'O campo categoria precisa ser especificado',
            'descricao' => 'O campo descricao é obrigatório',
            'prazo_solucao' => 'O campo prazo de solução é obrigatório',
            'situacao' => 'O campo situação é obrigatório',
            'data_criacao.required' => 'O campo de data de criação é obrigatório',
            'data_solucao' => 'O campo data de solução precisa ser uma data',
            'user_id' => 'O Chamado precisa ter um usuário identificado'
        ];
    }
}
