<?php

namespace App\Services;

use App\Contracts\AcademicInformationContract;
use App\Models\User;

class AcademicInformationService implements AcademicInformationContract
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
        return view('user.academic.create');
    }
}
