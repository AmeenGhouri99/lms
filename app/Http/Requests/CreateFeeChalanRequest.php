<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateFeeChalanRequest extends FormRequest
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
            'chalan_pic' => 'required|mimes:png,jpg,jpeg',
            'payment_method' => 'required',
            'admission_no' => 'required',
            'admission_date' => 'required',
            'admission_fee' => 'required',
            'transaction_id' => 'required',
            'bank_name' => 'required',
            'deposit_date' => 'required',
            'chalan_no' => 'required',

        ];
    }
    public function prepareRequest()
    {
        $request = $this;
        return [
            'user_id' => Auth::id(),
            'chalan_pic' => $request['chalan_pic'],
            'admission_id' => $request['admission_no'],
            'amount' => $request['admission_fee'],
            'deposited_date' => $request['deposit_date'],
            'transaction_id' => $request['transaction_id'],
            'payment_method' => $request['payment_method'],
            'bank_name' => $request['bank_name'],
            'admission_date' => $request['admission_date'],
            'chalan_no' => $request['chalan_no'],
        ];
    }
}
