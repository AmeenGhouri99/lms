<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAcademicInformationRequest extends FormRequest
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
            'qualification' => 'required',
            'board_university_name' => 'required',
            'roll_no' => 'required',
            'degree_exam_year' => 'required',
            'total_marks' => 'required',
            'obtained_marks' => 'required',
            'degree_image' => 'nullable|mimes:png,jpg,jpeg',
            'other_board_university_name' => 'required_if:board_university_name,124'
        ];
    }
    public function messages()
    {
        return [
            'other_board_university_name' => 'The other board university name field is required when board university name is Other',
        ];
    }
    public function prepareRequest()
    {
        $request = $this;
        return [
            'user_id' => Auth::id(),
            'qualification' => $request['qualification'],
            'board_university_id' => $request['board_university_name'],
            'roll_no' => $request['roll_no'],
            'degree_exam_year' => $request['degree_exam_year'],
            'total_marks' => $request['total_marks'],
            'obtained_marks' => $request['obtained_marks'],
            'image' => $request['degree_image'],
            'other_board_university_name' => $request['other_board_university_name'],
        ];
    }
}
