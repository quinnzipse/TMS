<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTask extends FormRequest
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
            'name' => 'required',
            'priority' => 'required|numeric|between:1,10',
            'timeMin' => 'required|numeric|between:0,10000',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Task name required',
            'timeMin.between' => 'Invalid time estimate',
            'timeMin.required' => 'Please enter an estimated time',
            'priority.required' => 'Please enter a priority',
            'priority.between' => 'Priority should be between 1-10'
        ];
    }
}
