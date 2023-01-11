<?php

namespace App\Http\Requests\State;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
        $allRules['name'] = 'required|string';
        $allRules['capital'] = 'required|string';
        $allRules['code'] = 'required|string|min:1|max:2';
        $allRules['year'] = 'required|date_format:Y';
  
        return $allRules;
    }
}
