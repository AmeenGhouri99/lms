<?php

namespace App\Services\Admin;

use App\Contracts\Admin\AppliedProgramContract;
use App\Exceptions\CustomException;
use App\Models\AppliedProgram;
use App\Models\FeeChalan;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppliedProgramService implements AppliedProgramContract
{
    public $appliedProgram;
    public function __construct()
    {
        $this->appliedProgram = new AppliedProgram();
    }
    public function edit($id)
    {
        $appliedProgram = $this->appliedProgram->find($id);
        if (empty($appliedProgram)) {
            throw new CustomException('No Records Found!');
        }
        return $appliedProgram;
    }
    public function update($data, $id)
    {
        // $document = $this->document->where('user_id', $data['user_id'])->first();
        // if (!empty($document)) {
        //     throw new CustomException('Record Already Exist');
        // }
        $model = $this->appliedProgram->find($id);
        if (empty($model)) {
            throw new CustomException("Record Not Exists!");
        }
        return $this->prepareData($model, $data, false);
    }
    public function delete($id)
    {
        $appliedProgram = $this->appliedProgram->find($id);
        if (!$appliedProgram->count() > 0) {
            throw new CustomException('Record Not Exists!');
        }
        return $appliedProgram->delete();;
    }
    private function prepareData($model, $data, $new_record = false)
    {
        if (isset($data['status']) && $data['status']) {
            $model->status = $data['status'];
        }
        $model->save();
        return $model;
    }
}
