<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService implements UserContract
{
    public $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
    }
    public function create()
    {
        // dd("ok");
        return view('user.personal_information.create');
    }
    public function reviewApplication()
    {
        $model = $this->user->with(['personalInformation', 'qualification', 'admission', 'document', 'feeChalan'])->find(Auth::id());
        return $model;
    }
}
