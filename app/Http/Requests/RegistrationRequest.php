<?php

namespace App\Http\Requests;

use Exception;
use HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'login' => "required|string|max:255",
            'password' => "required|string|max:255",
            'lastName' => "required|string|max:255",
            'birthDate' => "required|date-format:Y-m-d",
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => "Необходим логин",
            'password.required' => "Необходим пароль",
            'lastName.required' => "Необходима фамилия",
            'birthDate.required' => "Необходима дата рождения",
        ];
    }

}
