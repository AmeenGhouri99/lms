<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreatePersonalInformationRequest extends FormRequest
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
            'profile_image' => 'required|mimes:png,jpg,jpeg',
            'candidate_name' => 'required',
            'candidate_cnic' => 'required',
            'guardian_father_cnic' => 'required',
            'guardian_father_occupation' => 'required',
            'father_name' => 'required',
            'guardian_father_monthly_income_in_rs' => 'required',
            'annual_household_income' => 'required',
            'religion' => 'required',
            'hafiz_e_quran' => 'required',
            'disability' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'province' => 'required',
            'domicile' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'address' => 'required',
            'permanent_address' => 'required'
        ];
    }
    public function prepareRequest()
    {
        $request = $this;
        return [
            'user_id' => Auth::id(),
            'profile_image' => $request['profile_image'],
            'candidate_name' => $request['candidate_name'],
            'candidate_cnic' => $request['candidate_cnic'],
            'guardian_father_cnic' => $request['guardian_father_cnic'],
            'guardian_father_occupation' => $request['guardian_father_occupation'],
            'father_name' => $request['father_name'],
            'guardian_father_monthly_income_in_rs' => $request['guardian_father_monthly_income_in_rs'],
            'annual_household_income' => $request['annual_household_income'],
            'religion' => $request['religion'],
            'hafiz_e_quran' => $request['hafiz_e_quran'],
            'disability' => $request['disability'],
            'gender' => $request['gender'],
            'dob' => $request['dob'],
            'country_id' => $request['country'],
            'state_id' => $request['province'],
            'domicile_id' => $request['domicile'],
            'phone_no' => $request['phone_no'],
            'email' => $request['email'],
            'address' => $request['address'],
            'permanent_address' => $request['permanent_address'],
        ];
    }
}
