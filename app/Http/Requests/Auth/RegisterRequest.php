<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'id_number' => 'required|numeric|unique:users,id_number',
            'name' => 'required|string',
            'second_name' => 'nullable|string',
            'last_name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'number_phone' => 'nullable|numeric',
            'location' => 'nullable|string',
            'type' => 'required|in:Professional,Patient',
            'password' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A title is required',
        ];
    }
}
