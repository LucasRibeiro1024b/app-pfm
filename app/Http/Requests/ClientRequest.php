<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        return [
            'name' => 'required|string|unique:clients,name|max:100',
            'email' => 'required|email|unique:clients,email|max:100',
            'address' => 'required|string|max:100',
            'phone' => 'required|string',
            'type' => 'required|in:0,1',
            'cpfCnpj' => [
                'required',
                'string',
                'unique:clients,cpfCnpj',
                'regex:/^(\d{3}\.\d{3}\.\d{3}-\d{2}|\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2})$/'
            ],
        ];
    }
}
