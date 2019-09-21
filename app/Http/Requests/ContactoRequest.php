<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidRecaptcha;

class ContactoRequest extends FormRequest
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
            'nombre'                => 'required | string ',
            'email'                 => 'required | email ',
            'telefono'              => 'required | string',
            'empresa'               => 'required | string',
            'mensaje'               => 'required | string',
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
            'nombre.required'               => 'Nombre requerido!',
            'email.required'                => 'Email requerido!',
            'telefono.required'             => 'Telefono requerido!',
            'empresa.required'              => 'Empresa requerido!',
            'mensaje.required'              => 'Mensaje requerido!',

            'email.email'                   => 'Email error¡ Inténtalo de nuevo!',
            'g-recaptcha-response.required' => 'ReCaptcha requerido!',
            'g-recaptcha-response.captcha'  => 'Captcha error! Inténtalo de nuevo!',
        ];
    }
}
