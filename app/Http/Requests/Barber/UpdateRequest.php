<?php

namespace App\Http\Requests\Barber;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|integer',
            'rank_id' => 'required|integer|exists:ranks,id',
            'branch_id' => 'required|integer|exists:branches,id',
            'image' => 'nullable|file',
        ];
    }
}
