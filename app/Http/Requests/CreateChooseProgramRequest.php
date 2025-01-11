<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateChooseProgramRequest extends FormRequest
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
            'degree_level_to_apply' => 'required',
            'programs' => 'required',
        ];
    }
    public function prepareRequest()
    {
        $request = $this;
        return [
            'user_id' => Auth::id(),
            'programs' => $request['programs'],
            'degree_level_applied_id' => $request['degree_level_to_apply'],
            'e-cat_roll_no' => $request['e-cat_roll_no'],
            'e-cat_obtained_marks' => $request['e-cat_obtained_marks'],
            'e-cat_total_marks' => $request['e-cat_total_marks'],
            'is_e_cat_attempt' => $request['is_e_cat_attempt'],
            'voucher_no' => $this->generateVoucherNumber(),

        ];
    }
    private function generateVoucherNumber()
    {
        $year = now()->format('Y');
        $lastVoucher = \App\Models\Admission::latest('id')->value('voucher_no');
        $increment = $lastVoucher ? intval(substr($lastVoucher, -4)) + 1 : 1;
        return "ADM-$year-" . str_pad($increment, 4, '0', STR_PAD_LEFT);
    }
}
