<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateBriefRequest extends Request
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
            'project_id'=> 'required|exists:projects,id',
            'date'      => 'required|date|date_format:Y-m-d',
          //  'file'      => 'required',
            'details'   => 'string'
        ];
    }
}
