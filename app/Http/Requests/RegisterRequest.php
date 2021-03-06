<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nhap user name',
            'email.required' => 'Nhap email',
            'email.unique' => 'Email da ton tai',
            'password.required' => 'Nhap password',
        ];
    }
}
