<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToPrivateTaskRequest extends FormRequest
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
       /*
        *   rules for the visibility of the task 
        */
        $rules = [
                     'visibility' => 'in:Public,Private',
                ];

        return [

            'visibility' => $rules, // accepts only 'public' or 'private'

        ];
    }
}
