<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
        *   pre defined rules for the visibility of the task 
        */
        $rules = [
                     'visibility' => 'in:Public,Private',
                ];

        return [
            'title' => 'required|max:255',
            'body' => 'required|max:500',
            'deadline' => 'required|date', // Format : YYYY-MM-DD
            'visibility' => $rules, // accepts only 'public' or 'private'
            
        ];
    }
}
