<?php

namespace App\Http\Requests\ServiceDetail;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'rank_id' => 'required|integer|exists:ranks,id',
            'service_id' => 'required|integer|exists:services,id',
            'duration' => 'required|integer',
            'price' => 'required|integer',
        ];
    }
}
