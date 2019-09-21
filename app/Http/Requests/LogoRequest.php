<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            {
              return [
                'image'=> 'required',
                'type' => 'required|min:3|max:25|unique:logos,type',
              ];
            }
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'PUT':
            {
                return [
                    'type' => 'required|min:3|max:25|unique:logos,type,'.$this->id,
                ];
            }
            case 'PATCH':
            default:break;
        }

    }
}
