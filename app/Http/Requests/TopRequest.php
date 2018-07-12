<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        dd(123);
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
            'name' => 'required|unique:courses,course',    
            'teacher' => 'required',   
            'price' => 'required'
        ];
    }
    public function messages () {
        return [
            'name.required' => 'Nhap ten mon hoc',
            'teacher.required' => 'Nhap ten giang vien',
            'price.required' => 'Nhap gia',
            'name.unique'=> 'Ten Mon hoc da ton tai'
        ];
    }
}
