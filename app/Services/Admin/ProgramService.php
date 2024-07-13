<?php

namespace App\Services\Admin;

use App\Contracts\Admin\ProgramContract;
use App\Exceptions\CustomException;
use App\Models\FeeChalan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProgramService implements ProgramContract
{
    public $pdf;
    public $user;
    public function __construct()
    {
        $this->pdf = new FeeChalan();
        $this->user = new User();
    }
    public function index()
    {
    }
    public function create($id)
    {
        // dd($id);
        $user_id = Auth::id();
        $pdf = $this->user->with(['personalInformation', 'qualification', 'admission' => function ($query) use ($id) {
            $query->with('program')->where('id',  $id);
        }, 'document', 'feeChalan'])->find($user_id);
        return $pdf;
    }
    public function edit($id)
    {
        $pdf = $this->pdf->find($id);
        return $pdf;
    }
    public function store($data)
    {
        $record_exist = $this->pdf->where('document_type', $data['document_type'])->where('user_id', $data['user_id'])->first();
        if (!empty($record_exist)) {
            throw new CustomException('Specific Document Already Uploaded!');
        }
        $model = new $this->pdf;
        return $this->prepareData($model, $data, true);
    }
    public function update($data, $id)
    {
        // $document = $this->document->where('user_id', $data['user_id'])->first();
        // if (!empty($document)) {
        //     throw new CustomException('Record Already Exist');
        // }
        $model = $this->pdf->find($id);
        if (empty($model)) {
            throw new CustomException("Record Not Exists!");
        }
        return $this->prepareData($model, $data, false);
    }
    public function delete($id)
    {
        $document = $this->pdf->where('user_id', Auth::id())->find($id);
        if (!$document->count() > 0) {
            throw new CustomException('Record Not Exists!');
        }
        return $document->delete();;
    }
    private function prepareData($model, $data, $new_record = false)
    {
        if (isset($data['user_id']) && $data['user_id']) {
            $model->user_id = $data['user_id'];
        }

        if (isset($data['document_type']) && $data['document_type']) {
            $model->document_type = $data['document_type'];
        }

        if (isset($data['document']) && $data['document']) {
            $image_path = $this->upload($data['document']);
            $model->document = $image_path;
        }
        $model->save();
        return $model;
    }
}
