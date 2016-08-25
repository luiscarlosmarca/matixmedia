<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProfileRequest extends Request
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
            'email_company'  => 'email|max:255',
            'curriculum'     =>'mimes:pdf,zip,rar',
            'password'       => 'confirmed|min:6'
        ];
    }
}
