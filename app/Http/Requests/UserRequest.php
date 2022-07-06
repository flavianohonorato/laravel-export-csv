<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'email' => ['email', 'required', Rule::unique('users', 'email')->ignore($this->email)],
            'password' => ['required'],
            'phone' => ['required'],
            'cpf' => ['required', 'max:14']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required'  => ':attribute é obrigatório!',
            'unique'    => 'Já existe um registro para esse :attribute!',
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
