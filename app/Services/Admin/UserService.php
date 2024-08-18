<?php

namespace App\Services\Admin;

use App\Contracts\Admin\UserContract as AdminUserContract;
use App\Exceptions\CustomException;
use App\Models\User;
use App\Traits\ImageUpload;
use Exception;

class UserService implements AdminUserContract
{
    use ImageUpload;
    public $model;
    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {
        return $this->model->get();
    }

    public function edit($id)
    {
        $user = $this->model->with('personalInformation')->find($id);
        if (empty($user)) {
            new CustomException('User Not Found!');
        }
        return $user;
    }

    public function delete($id)
    {
        $user = $this->model->find($id);
        if (empty($user)) {
            new CustomException('User Not Found!');
        }
        $user->delete();
        return $user;
    }
    public function update($data, $id)
    {
        $model = $this->model->find($id);
        if (empty($model)) {
            throw new Exception('User Not Found!');
        }
        $user = $this->prepareData($model, $data, false);
        return $user;
    }
    private function prepareData($model, $data, $new_record = false)
    {
        if (isset($data['full_name']) && $data['full_name']) {
            $model->full_name = $data['full_name'];
        }
        if (isset($data['cnic']) && $data['cnic']) {
            $model->cnic = $data['cnic'];
        }
        if (isset($data['father_name']) && $data['father_name']) {
            $model->father_name = $data['father_name'];
        }
        if (isset($data['status'])) {
            $model->status = $data['status'];
        }
        // $model->status = $data['status'];

        // if (isset($data['password']) && $data['password']) {
        //     $model->password = $data['password'];
        // }
        if (isset($data['degree_level_to_apply']) && $data['degree_level_to_apply']) {
            $model->degree_level_to_apply = $data['degree_level_to_apply'];
        }
        if (isset($data['email']) && $data['email']) {
            $model->email = $data['email'];
        }
        $model->save();

        return $model;
    }
}
