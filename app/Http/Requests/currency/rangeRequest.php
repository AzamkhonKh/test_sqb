<?php

namespace App\Http\Requests\currency;

use Illuminate\Foundation\Http\FormRequest;

class rangeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'from' => ['required','date_format:Y-m-d'],
            'to' => ['required','date_format:Y-m-d'],
            'valuteID' => ['exists:currency,valuteID'],
        ];
    }
}
