<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $supplierId = $this->route('supplier'); 

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('suppliers', 'id')->ignore($supplierId), // Exclude current supplier's email from uniqueness check
            ],
            'personType' => 'required|boolean',
            'personTypeCode' => [
                'regex:/^(\d{3}\.\d{3}\.\d{3}-\d{2}|\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2})$/',
                'required',
                'string',
                Rule::unique('suppliers', 'id')->ignore($supplierId), // Exclude current supplier's personTypeCode from uniqueness check
            ],
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20|regex:/^\(\d{2}\) \d{5}-\d{4}$/',
            'user_id' => 'nullable|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',

            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail informado não é válido.',
            'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este e-mail já está em uso.',

            'personType.required' => 'O campo tipo de pessoa é obrigatório.',
            'personType.boolean' => 'O tipo de pessoa deve ser verdadeiro ou falso.',

            'personTypeCode.required' => 'O campo CPF/CNPJ é obrigatório.',
            'personTypeCode.regex' => 'O CPF/CNPJ informado não é válido.',
            'personTypeCode.string' => 'O CPF/CNPJ deve ser um texto.',
            'personTypeCode.unique' => 'Este CPF/CNPJ já está em uso.',

            'address.string' => 'O endereço deve ser um texto.',
            'address.max' => 'O endereço não pode ter mais de 255 caracteres.',

            'telephone.string' => 'O telefone deve ser um texto.',
            'telephone.max' => 'O telefone não pode ter mais de 20 caracteres.',
            'telephone.regex' => 'O telefone deve estar no formato (XX) XXXXX-XXXX.',

            'user_id.exists' => 'O usuário selecionado não existe.',
        ];
    }
}
