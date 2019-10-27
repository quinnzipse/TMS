<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO: add authorities to this guy
        return true; //return true at some point
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
            'desc' => 'required'
        ];
    }

    public function messages(){
        return [
          'name.required' => 'Task name required',
            'name.between' => 'Character limit reached',
            'timeMin.between' => 'Invalid time estimate',
            'timeMin.required' => 'Please enter an estimated time',
            'priority.required' => 'Please enter a priority',
            'priority.between' => 'Priority should be between 1-10'
        ];
    }
}
