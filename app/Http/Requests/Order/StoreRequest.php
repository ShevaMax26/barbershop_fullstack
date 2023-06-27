<?php

namespace App\Http\Requests\Order;

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
            'branch_id' => 'required|integer|exists:branches,id',
            'barber_id' => 'required|integer|exists:barbers,id',
            'scheduled_time' => 'required|date',
            'customer_name' => 'required|string',
            'customer_phone' => 'required|integer',
            'services' => 'required|array',
        ];
    }
}
