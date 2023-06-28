<?php

namespace App\Http\Requests\API\Order;

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
            'branch_id' => 'nullable|integer',
            'services' => 'nullable|array',
            'customer_name' => 'nullable|string',
            'customer_phone' => 'nullable|integer',
            'scheduled_date' => 'nullable',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'is_available' => 'nullable|boolean',
        ];
    }
}
