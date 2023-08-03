<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введіть ім\'я',
            'email.required' => 'Введіть email',
            'email.email' => 'Невірний формат email',
            'password.required' => 'Введіть пароль',
            'password.confirmed' => 'Паролі не співпадають',
            'password_confirmation.required' => 'Підтвердження пароля є обов\'язковим',
        ];
    }
}
