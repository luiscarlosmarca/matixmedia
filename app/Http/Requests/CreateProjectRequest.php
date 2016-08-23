<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Project;
use App\Service;
use App\User;
use App\Payment;
use App\Tracing;
use App\Brief;
class CreateProjectRequest extends Request
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
          'name'         => 'required|max:255',
          'details'       => 'required|string',
          'price'        => 'required|integer',
          'service_id'   => 'required|exists:services,id',
          'dateStart'    => 'required|date|date_format:Y-m-d|before:dateFinish',
          'dateFinish'   => 'date|date_format:Y-m-d|after:dateStart',
          'developer_id' => 'required|exists:users,id',
         'costumer_id'   => 'required|exists:users,id',
         'file'          =>'required'
        ];
    }
}
