<?php

namespace App\Services;

use App\Contracts\AuthContract;
use App\Models\User;

class AuthService implements AuthContract
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
        return view('user.login');
    }
    public function store($data)
    {
        dd($data);
    }
}
