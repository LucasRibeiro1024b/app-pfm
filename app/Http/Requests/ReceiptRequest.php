<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'value' => 'required|numeric',
            'payment_date' => 'nullable|date',
            'end_date' => 'required|date',
            'project_id' => 'required|exists:projects,id',
            'client_id' => 'required|exists:clients,id',
        ];
    }

    public function messages() {
        return [
            // Title
            'title.required' => 'O campo título é obrigatório.',
            'title.string' => 'O título deve ser um texto.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
    
            // Description
            'description.required' => 'O campo descrição é obrigatório.',
            'description.string' => 'A descrição deve ser um texto.',
    
            // Value
            'value.required' => 'O campo valor é obrigatório.',
            'value.numeric' => 'O valor deve ser um número.',
    
            // Payment Date
            'payment_date.date' => 'A data de pagamento deve ser uma data válida.',
    
            // End Date
            'end_date.required' => 'O campo data de vencimento é obrigatório.',
            'end_date.date' => 'A data de vencimento deve ser uma data válida.',
    
            // Project ID
            'project_id.required' => 'O campo projeto é obrigatório.',
            'project_id.exists' => 'O projeto selecionado é inválido.',
    
            // Client ID
            'client_id.required' => 'O campo cliente é obrigatório.',
            'client_id.exists' => 'O cliente selecionado é inválido.',
        ];
    }
}
