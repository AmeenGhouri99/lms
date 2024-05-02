<?php

namespace App\Services;

use App\Contracts\PersonalInformationContract;
use App\Models\User;

class PersonalInformationService implements PersonalInformationContract
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
        return view('user.personal_information.create');
    }
}
