<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserChooseProgramController extends Controller
{
    public function create()
    {
        return view('user.choose_to_apply.create');
    }
}
