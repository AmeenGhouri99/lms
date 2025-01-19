<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAdmissionUpdateRequest extends FormRequest
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
        //dd($userId);
        return [
            'admission_fee' => 'required',
            'status' => 'required',
            'admission_date' => 'required',
            'admission_term' => 'nullable',
        ];
    }
    public function prepareRequest()
    {
        $request = $this;
        return [
            'admission_fee' => $request['admission_fee'],
            'status' => $request['status'],
            'admission_date' => $request['admission_date'],
            'admission_term' => $request['admission_term'],
        ];
    }
}
