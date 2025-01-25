<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $clientId = $this->route('id');
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('clients', 'name')->ignore($clientId),
            ], 
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('clients', 'email')->ignore($clientId),
            ],
            'address' => 'required|string|max:255',
            'phone' =>'required|string|max:20',
            'type' => 'required|in:0,1',
            'cpfCnpj' => [
                'required',
                'string',
                Rule::unique('clients', 'cpfCnpj')->ignore($clientId),
                'regex:/^(\d{3}\.\d{3}\.\d{3}-\d{2}|\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2})$/'
            ],
        ];
    }
}