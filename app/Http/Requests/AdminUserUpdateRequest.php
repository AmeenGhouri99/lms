<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserUpdateRequest extends FormRequest
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

        $userId = $this->route('user');
        // dd($userId);
        return [
            'email' => 'required|email|unique:users,email,' . $userId,
            'full_name' => 'required',
            'father_name' => 'required',
            'cnic' => 'required|unique:users,cnic,' . $userId,
        ];
    }
    public function prepareRequest()
    {
        $request = $this;
        return [
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'cnic' => $request['cnic'],
            // 'password' => $request['password'],
            // 'degree_level_to_apply' => $request['degree_level_to_apply'],
            'father_name' => $request['father_name'],
            'status' => $request['status']
        ];
    }
}
