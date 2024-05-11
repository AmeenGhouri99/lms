<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            "full_name" => 'required',
            "father_name" => 'required',
            "cnic_or_b-form" => "required|unique:users,cnic",
            'password' => 'required|confirmed|min:6',
            'degree_level_to_apply' => 'required'
        ];
    }
    public function prepareRequest()
    {
        $request = $this;
        return [
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'cnic' => $request['cnic_or_b-form'],
            'password' => $request['password'],
            'degree_level_to_apply' => $request['degree_level_to_apply'],
            'father_name' => $request['father_name']
        ];
    }
}
