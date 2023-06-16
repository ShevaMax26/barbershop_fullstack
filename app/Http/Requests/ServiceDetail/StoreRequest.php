<?php

namespace App\Http\Requests\ServiceDetail;

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
            'ranks_id' => 'required|integer|exists:ranks,id',
            'service_id' => 'required|integer|exists:services,id',
            'duration' => 'required|integer',
            'price' => 'required|integer',
        ];
    }
}
