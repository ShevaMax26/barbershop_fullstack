<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|string|min:9',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введіть ім\'я',
            'phone.required' => 'Введіть номер телефону',
            'phone.min' => 'Телефон повинен бути не менше 12 символів.',
            'email.required' => 'Введіть email',
            'email.email' => 'Невірний формат email',
        ];
    }
}
