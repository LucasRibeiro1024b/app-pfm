<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class TaskRequest extends FormRequest
{

    // protected $redirectRoute = 'clients.index';

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
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:512',
            'value' => 'required|regex:/^\d+(\.\d{2})$/|min:0',
            'predicted_hour' => 'required|numeric',
            'completed' => 'required|in:0,1',
        ];
    }
}
