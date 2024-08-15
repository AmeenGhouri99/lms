<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProgramRequest extends FormRequest
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
            'name' => 'required',
        ];
    }
    public function prepareData(): array
    {
        $request = $this->all();

        return [
            'name' => $request['name'] ?? null,
            'fsc_pre_eng_can_apply' => $request['fsc_pre_eng_can_apply'] ?? null,
            'fsc_pre_eng_60_percentage_for_engineering_programs' => $request['fsc_pre_eng_60_percentage_for_engineering_programs'] ?? null,
            'fsc_pre_med_can_apply' => $request['fsc_pre_med_can_apply'] ?? null,
            'dae_chemical' => $request['dae_chemical'] ?? null,
            'dae_mechanical' => $request['dae_mechanical'] ?? null,
            'dae_civil' => $request['dae_civil'] ?? null,
            'dae_electrical' => $request['dae_electrical'] ?? null,
            'dae_chemical_with_60_percentage' => $request['dae_chemical_with_60_percentage'] ?? null,
            'dae_electrical_with_60_percentage' => $request['dae_electrical_with_60_percentage'] ?? null,
            'fa_simple_can_apply' => $request['fa_simple_can_apply'] ?? null,
            'fa_with_it_math_can_apply' => $request['fa_with_it_math_can_apply'] ?? null,
            'icom_can_apply' => $request['icom_can_apply'] ?? null,
            'ics_can_apply' => $request['ics_can_apply'] ?? null,
            'merit' => $request['merit'] ?? null,
            'status' => $request['status'] ?? null,
            'is_entry_test_required' => $request['is_entry_test_required'] ?? null,
            'is_university_test_required' => $request['is_university_test_required'] ?? null,
        ];
    }
}
