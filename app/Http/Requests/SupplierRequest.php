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
                'required',
                'string',
                'min:11',  // CPF or CNPJ length validation
                'max:14',  // CPF or CNPJ length validation
                Rule::unique('suppliers', 'id')->ignore($supplierId), // Exclude current supplier's personTypeCode from uniqueness check
            ],
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'user_id' => 'nullable|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do fornecedor é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',

            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'personType.required' => 'O tipo de pessoa é obrigatório.',
            'personType.in' => 'O tipo de pessoa deve ser "fisica" ou "juridica".',

            'personTypeCode.required' => 'O CPF/CNPJ é obrigatório.',
            'personTypeCode.unique' => 'Este CPF/CNPJ já está cadastrado.',

            'address.string' => 'O endereço deve ser um texto.',
            'address.max' => 'O endereço não pode ter mais de 255 caracteres.',

            'telephone.string' => 'O telefone deve ser um texto.',
            'telephone.max' => 'O telefone não pode ter mais de 20 caracteres.',

            'user_id.exists' => 'O usuário associado selecionado é inválido.',
        ];
    }
}
