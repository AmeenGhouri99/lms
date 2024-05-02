<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\Models\User;

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
}
