<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SituacoesRequest extends FormRequest
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
            'nome' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome' => 'O nome da situação deve ser uma das opções: Novo, Em Atendimento ou Resolvido.O nome da situação deve ser uma das opções: Novo, Em Atendimento ou Resolvido.'
        ];
    }
}
