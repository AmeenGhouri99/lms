<?php

namespace App\Services;

use App\Contracts\DocumentContract;
use App\Exceptions\CustomException;
use App\Models\Document;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

class DocumentService implements DocumentContract
{
    public $document;
    use ImageUpload;
    public function __construct()
    {
        $this->document = new Document();
    }
    public function index()
    {
    }
    public function create()
    {
        $user_id = Auth::id();
        $document = $this->document->where('user_id', $user_id)->get();
        return $document;
    }
    public function edit($id)
    {
        $document = $this->document->find($id);
        return $document;
    }
    public function store($data)
    {
        $record_exist = $this->document->where('document_type', $data['document_type'])->where('user_id', $data['user_id'])->first();
        if (!empty($record_exist)) {
            throw new CustomException('Specific Document Already Uploaded!');
        }
        $model = new $this->document;
        return $this->prepareData($model, $data, true);
    }
    public function update($data, $id)
    {
        // $document = $this->document->where('user_id', $data['user_id'])->first();
        // if (!empty($document)) {
        //     throw new CustomException('Record Already Exist');
        // }
        $model = $this->document->find($id);
        if (empty($model)) {
            throw new CustomException("Record Not Exists!");
        }
        return $this->prepareData($model, $data, false);
    }
    public function delete($id)
    {
        $document = $this->document->where('user_id', Auth::id())->find($id);
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
