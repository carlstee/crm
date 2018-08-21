<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SidebarValidation extends FormRequest
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
            'search' => 'nullable | max:5',
            'category' => 'nullable | max:5',
            'recent_post' => 'nullable | max:5',
            'tag' => 'nullable | max:5',
            'advertisement'=> 'nullable | max:5'
        ];
    }
}
