<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'birthday' => ['required',
                'before_or_equal:' . Carbon::today()->subYears(18)->toDateString()
            ],
            'gender' => ['required'],
            'country' => ['required', 'min:4'],
            'picture' => ['required']
        ];
    }

     public function messages()
     {
         return [
             'before_or_equal' => 'You must be at least 18 years old!'
         ];
     }

}
