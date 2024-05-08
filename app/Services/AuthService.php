<?php

namespace App\Services;

use App\Contracts\AuthContract;
use App\Exceptions\CustomException;
use App\Models\User;

class AuthService implements AuthContract
{
    public $model;
    public function __construct()
    {
        $this->model = new User();
    }
    public function index()
    {
    }
    public function create()
    {
        return view('user.auth.login');
    }
    public function store($data)
    {
        $user = $this->model->where('cnic', $data['cnic'])->orWhere('email', $data['email'])->first();
        if ($user) {
            throw new CustomException("This CNIC/b-form already Registered!");
        }
        $model = new $this->model;
        return $this->prepareData($model, $data, true);
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
        if (isset($data['password']) && $data['password']) {
            $model->password = $data['password'];
        }
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
