<?php

namespace App\Services;

use App\Contracts\AuthContract;
use App\Exceptions\CustomException;
use App\Models\User;
use App\Traits\ImageUpload;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthContract
{
    use ImageUpload;
    public $model;
    public function __construct()
    {
        $this->model = new User();
    }
    public function checkAdmissionDate()
    {
        // Retrieve the admission dates from settings
        $admission_start_date = Carbon::parse(settings('admission_start_date'));
        $admission_end_date = Carbon::parse(settings('admission_end_date'));
        $current_date = Carbon::now();
        if ($admission_start_date->lessThan($current_date) && $admission_end_date->greaterThan($current_date)) {
            return true;
        } else {
            return false;
        }
    }
    public function index() {}
    public function profile()
    {
        $user = $this->model->find(auth()->user()->id);
        return $user;
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
    public function update($data, $id)
    {
        // dd($data);
        $model = $this->model->find($id);
        if (empty($model)) {
            throw new CustomException("User Not Found!");
        }

        if (isset($data['old_password']) && $data['old_password'] && $data['password']) {
            $check_old_password = Hash::check($data['old_password'], $model->password);
            if ($check_old_password == false) {
                throw new CustomException("Old Password Not Correct!");
            }
        }

        $user = $this->prepareData($model, $data, false);
        return $user;
    }
    public function login($data)
    {
        $user = $this->model->where('cnic', $data['cnic'])->first();
        if (!$user) {
            throw new CustomException("Sorry this CNIC/b-form Not Registered!");
        }
        if (!Auth::attempt(['cnic' => $data['cnic'], 'password' => $data['password']])) {
            throw new CustomException('Invalid Credentials');
        }
        return $user;
    }
    private function prepareData($model, $data, $new_record = false)
    {
        if (isset($data['full_name']) && $data['full_name']) {
            $model->full_name = $data['full_name'];
        }
        if (isset($data['profile_image']) && $data['profile_image']) {
            // dd($data['profile_image']);
            // $model->profile_image = $data['profile_image'];
            $image_path = $this->upload($data['profile_image']);
            $model->profile_image = $image_path;
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