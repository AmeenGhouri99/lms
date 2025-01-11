<?php

namespace App\Contracts\Admin;

interface MeritListContract
{
    public function generateMeritList($data);
    public function create();
}
