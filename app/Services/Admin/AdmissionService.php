<?php

namespace App\Services\Admin;

use App\Contracts\Admin\AdmissionContract;
use App\Exceptions\CustomException;
use App\Models\Admission;
use App\Models\FeeChalan;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdmissionService implements AdmissionContract
{
    public $admission;
    public function __construct()
    {
        $this->admission = new Admission();
    }
    public function index() {}
    public function create()
    {
        // $parent_programs = $this->program->where('parent_id', null)->pluck('name', 'id');
        // return $parent_programs;
    }
    public function edit($id)
    {
        $admission = $this->admission->with('admissionFee', 'user')->find($id);
        if (empty($admission)) {
            throw new CustomException('No Records Found!');
        }
        return $admission;
    }
    public function store($data)
    {
        $model = new $this->admission;
        return $this->prepareData($model, $data, true);
    }
    public function update($data, $id)
    {
        // $document = $this->document->where('user_id', $data['user_id'])->first();
        // if (!empty($document)) {
        //     throw new CustomException('Record Already Exist');
        // }
        $model = $this->admission->find($id);
        if (empty($model)) {
            throw new CustomException("Record Not Exists!");
        }
        return $this->prepareData($model, $data, false);
    }
    public function delete($id)
    {
        $admission = $this->admission->find($id);
        if (!$admission->count() > 0) {
            throw new CustomException('Record Not Exists!');
        }
        return $admission->delete();;
    }
    private function prepareData($model, $data, $new_record = false)
    {
        if (isset($data['status']) && $data['status']) {
            $model->status = $data['status'];
        }
        if (isset($data['admission_fee']) && $data['admission_fee']) {
            $model->admission_fee = $data['admission_fee'];
        }
        // Field: fsc_pre_eng_can_apply
        if (isset($data['admission_term'])) {
            $model->admission_term = $data['admission_term'];
        }
        // Field: admission_date
        if (isset($data['admission_date'])) {
            $model->admission_date = $data['admission_date'];
        }
        $model->save();
        return $model;
    }
}
