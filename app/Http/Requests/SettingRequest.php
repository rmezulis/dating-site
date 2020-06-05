<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from_age' => ['required', 'lte:to_age'],
            'to_age' => ['required', 'gte:from_age'],
            'gender' => ['required']
        ];
    }
}
