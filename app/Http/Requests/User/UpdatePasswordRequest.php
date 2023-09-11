<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => 'required|string',
            'new_password' => 'required|string|confirmed',
            'new_password_confirmation' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Введіть старий пароль',
            'new_password.required' => 'Введіть новий пароль',
            'new_password.confirmed' => 'Пароль не підтверджено',
            'new_password_confirmation.required' => 'Підтвердження пароля є обов\'язковим',
        ];
    }
}
