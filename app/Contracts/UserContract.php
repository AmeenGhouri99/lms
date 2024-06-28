<?php

namespace App\Contracts;

interface UserContract
{
    public function index();
    public function create();
    public function reviewApplication($id);
    public function isUndertakingAccept($data);
}
