<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        // dd($this);
        if ($this->password != "") {
            return [
                'old_password' => 'required',
                'password' => 'required|confirmed|min:8'
            ];
        }
        return [
            'profile_image' => 'nullable|image|max:2048',
            'full_name'    => 'nullable',
            'email' => 'nullable',
        ];
    }

    public function prepareRequest()
    {
        $request = $this;
        return [
            'profile_image' => $request['profile_image'],
            'full_name'    => $request['full_name'],
            'password'      => $request['password'],
            'old_password'  => $request['old_password'],
            'email' => $request['email'],
        ];
    }
}