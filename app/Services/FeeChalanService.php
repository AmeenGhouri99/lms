<?php

namespace App\Services;

use App\Contracts\FeeChalanContract;
use App\Exceptions\CustomException;
use App\Models\FeeChalan;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Auth;

class FeeChalanService implements FeeChalanContract
{
    use ImageUpload;
    public $model;
    public function __construct()
    {
        $this->model = new FeeChalan();
    }
    public function index($data)
    {
    }
    public function create()
    {
    }
    public function edit($id)
    {
        $model = $this->model->find($id);
        return $model;
    }
    public function show($id)
    {
        $model = $this->model->where('user_id', Auth::id())->where('admission_id', $id)->first();
        if (!empty($model)) {
            return redirect()->route('user.review-application');
            throw new CustomException('Chalan Information already saved.');
        }
        return $model;
    }
    public function store($data)
    {
        $exists = $this->model->where('user_id', $data['user_id'])->where('admission_id', $data['admission_id'])->first();
        if (!empty($exists)) {
            throw new CustomException('Admission Fee already paid.');
        }
        $model = new $this->model;
        return $this->prepareData($model, $data, true);
    }
    public function update($data, $id)
    {
        // $choose_program = $this->choose_program->where('user_id', $data['user_id'])->first();
        // if (!empty($choose_program)) {
        //     throw new CustomException('Record Already Exist');
        // }
        $model = $this->model->find($id);
        if (empty($model)) {
            throw new CustomException("Record Not Exists!");
        }
        return $this->prepareData($model, $data, false);
    }
    public function delete($id)
    {
        $model = $this->model->where('user_id', Auth::id())->find($id);
        if (!$model->count() > 0) {
            throw new CustomException('Record Not Exists!');
        }
        return $model->delete();;
    }
    private function prepareData($model, $data, $new_record = false)
    {
        // dd($data);
        if (isset($data['user_id']) && $data['user_id']) {
            $model->user_id = $data['user_id'];
        }
        if (isset($data['payment_method']) && $data['payment_method']) {
            $model->payment_method = $data['payment_method'];
        }
        if (isset($data['admission_date']) && $data['admission_date']) {
            $model->admission_date = $data['admission_date'];
        }
        if (isset($data['admission_id']) && $data['admission_id']) {
            $model->admission_id = $data['admission_id'];
        }
        if (isset($data['transaction_id']) && $data['transaction_id']) {
            $model->transaction_id = $data['transaction_id'];
        }
        if (isset($data['bank_name']) && $data['bank_name']) {
            $model->bank_name = $data['bank_name'];
        }
        if (isset($data['chalan_pic']) && $data['chalan_pic']) {
            $model->chalan_pic = $this->upload($data['chalan_pic']);
        }
        if (isset($data['deposited_date']) && $data['deposited_date']) {
            $model->deposited_date = $data['deposited_date'];
        }
        if (isset($data['amount']) && $data['amount']) {
            $model->amount = $data['amount'];
        }
        if (isset($data['chalan_no']) && $data['chalan_no']) {
            $model->chalan_no = $data['chalan_no'];
        }
        $model->save();
        return $model;
    }
}
