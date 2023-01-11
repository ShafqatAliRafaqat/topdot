<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
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
        $allRules['value'] = 'required|string';
        $allRules['parent_car_id'] = 'nullable|exists:cars,id';
  
        return $allRules;
    }
}
