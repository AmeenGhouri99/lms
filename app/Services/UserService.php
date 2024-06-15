<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\Exceptions\CustomException;
use App\Models\Admission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService implements UserContract
{
    public $user;
    public $admission_model;
    public function __construct()
    {
        $this->user = new User();
        $this->admission_model = new Admission();
    }
    public function index()
    {
    }
    public function create()
    {
        // dd("ok");
        return view('user.personal_information.create');
    }
    public function reviewApplication($id)
    {
        $model = $this->user->with(['personalInformation', 'qualification', 'admission', 'document', 'feeChalan'])->find(Auth::id());
        return $model;
    }

    public function isUndertakingAccept($data)
    {
        // dd($data);
        $admission_model = $this->admission_model->find($data['admission_id']);
        // dd($admission_model);
        $admission_model->update([
            'is_undertaking_accept' => $data['accept_all']
        ]);
        return $admission_model;
    }
}
