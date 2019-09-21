<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidRecaptcha;

class PresupuestoRequest extends FormRequest
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
            'name'                 => 'required | string ',
            'location'             => 'required | string ',
            'phone'                => 'required | string',
            'email'                => 'required | email',
            'g-recaptcha-response' => ['required', new ValidRecaptcha] 
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'ReCaptcha requerido!',
            'g-recaptcha-response.captcha'  => 'Captcha error! Inténtalo de nuevo!',
        ];
    }
}
