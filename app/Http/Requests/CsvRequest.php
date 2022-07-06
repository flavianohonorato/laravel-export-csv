<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['email', 'required'],
            'phone' => ['required'],
            'cpf' => ['required', 'max:11']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required'  => ':attribute é obrigatório!',
            'unique'    => 'Já existe um registro para esse :attibute!',
            'max'       => ':attribute não pode ser maior que :max!',
            'email'     => ':attribute está com formato inválido'
        ];
    }

    /**
     * @return array|string[]
     */
    public function attributes(): array
    {
        return [
            'name'      => 'Nome',
            'cpf'       => 'CPF',
            'max'       => 'Máximo',
        ];
    }
}
