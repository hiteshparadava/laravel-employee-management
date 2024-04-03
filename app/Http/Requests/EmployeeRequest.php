<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;


class EmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return
            [
                'name'=>'required|max:50',
                'photo'=>'required|mimes:jpeg,jpg,png',
                'department_id'=>'required',
                'dob'=>'required',
                'phone'=>'required|numeric',
                'email'=>'required|email',
                'salary'=>'required|numeric',
            ];
    }
}
