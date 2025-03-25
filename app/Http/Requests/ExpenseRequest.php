<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'description' => 'nullable|string',
            'value' => 'required|numeric',
            'payment_date' => 'nullable|date',
            'end_date' => 'required|date',
            'quantity' => 'nullable|integer',
            'hours' => 'nullable|integer',
            'project_id' => 'required|exists:projects,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'title.string' => 'O título deve ser um texto.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',

            'value.required' => 'O campo valor é obrigatório.',
            'value.numeric' => 'O valor deve ser um número.',

            'payment_date.date' => 'A data de pagamento deve ser uma data válida.',

            'quantity.integer' => 'A quantidade deve ser um número inteiro.',
            'hours.integer' => 'As horas devem ser um número inteiro.',

            'project_id.required' => 'O campo projeto é obrigatório.',
            'project_id.exists' => 'O projeto selecionado é inválido.',

            'supplier_id.required' => 'O campo fornecedor é obrigatório.',
            'supplier_id.exists' => 'O fornecedor selecionado é inválido.',

            'category_id.required' => 'O campo categoria é obrigatório.',
            'category_id.exists' => 'A categoria selecionada é inválida.',
        ];
    }
}
