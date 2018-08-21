<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteInfoFormValidation extends FormRequest
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
            'contact_icon' => 'required | max:191',
            'phone_number' => 'required|numeric',
            'service_time_icon' => 'required | max:191',
            'service_time' => 'required | max:191',
            'facebook_url' => 'required | max:191',
            'twitter_link' => 'required | max:191',
            'linkedin_link' => 'required | max:191',
            'pinterest_link' => 'required  |max:191',
            'status' => 'nullable | max:191'
        ];
    }
}
