<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSettingRequest extends FormRequest
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
            'admission_picture' => 'required|mimes:png,jpg,jpeg',
            'admission_end_date' => 'required',
            'admission_start_date' => 'required',
            'admission_fee' => 'required|integer',
        ];
    }
    public function prepareRequest()
    {
        $request = $this;
        return [
            'admission_picture' => $request['admission_picture'],
            'admission_start_date' => $request['admission_start_date'],
            'admission_end_date' => $request['admission_end_date'],
            'admission_fee' => $request['admission_fee'],

        ];
    }
}
