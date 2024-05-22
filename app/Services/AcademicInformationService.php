<?php

namespace App\Services;

use App\Contracts\AcademicInformationContract;
use App\Exceptions\CustomException;
use App\Models\AcademicInformation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AcademicInformationService implements AcademicInformationContract
{
    public $academic_information;
    public function __construct()
    {
        $this->academic_information = new AcademicInformation();
    }
    public function index()
    {
    }
    public function create()
    {
        $user_id = Auth::id();
        $user_academic_detail = $this->academic_information->where('user_id', $user_id)->get();
        return $user_academic_detail;
    }
    public function edit($id)
    {
        $user_academic_detail = $this->academic_information->find($id);
        return $user_academic_detail;
    }
    public function store($data)
    {
        $model = new $this->academic_information;
        return $this->prepareData($model, $data, true);
    }
    public function update($data, $id)
    {
        // $academic_information = $this->academic_information->where('user_id', $data['user_id'])->first();
        // if (!empty($academic_information)) {
        //     throw new CustomException('Record Already Exist');
        // }
        $model = $this->academic_information->find($id);
        if (empty($model)) {
            throw new CustomException("Record Not Exists!");
        }
        return $this->prepareData($model, $data, false);
    }
    public function delete($id)
    {
        $user_academic_detail = $this->academic_information->where('user_id', Auth::id())->find($id);
        if (!$user_academic_detail->count() > 0) {
            throw new CustomException('Record Not Exists!');
        }
        return $user_academic_detail->delete();;
    }
    private function prepareData($model, $data, $new_record = false)
    {
        if (isset($data['user_id']) && $data['user_id']) {
            $model->user_id = $data['user_id'];
        }

        if (isset($data['qualification']) && $data['qualification']) {
            $model->qualification = $data['qualification'];
        }

        if (isset($data['board_university_name']) && $data['board_university_name']) {
            $model->board_university_name = $data['board_university_name'];
        }

        if (isset($data['roll_no']) && $data['roll_no']) {
            $model->roll_no = $data['roll_no'];
        }

        if (isset($data['degree_exam_year']) && $data['degree_exam_year']) {
            $model->degree_exam_year = $data['degree_exam_year'];
        }

        if (isset($data['total_marks']) && $data['total_marks']) {
            $model->total_marks = $data['total_marks'];
        }

        if (isset($data['obtained_marks']) && $data['obtained_marks']) {
            $model->obtained_marks = $data['obtained_marks'];
        }
        $model->save();
        return $model;
    }
}
