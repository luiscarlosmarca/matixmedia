<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProjectRequest extends Request
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
        return [
          'name'         => 'required|max:255',
          'details'       => 'required|string',


          'dateStart'    => 'required|date|date_format:Y-m-d|before:dateFinish',
          'dateFinish'   => 'date|date_format:Y-m-d|after:dateStart',
          'developer_id' => 'required|exists:users,id',


        ];
    }
}
