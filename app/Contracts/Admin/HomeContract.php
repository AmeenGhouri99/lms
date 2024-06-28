<?php

namespace App\Contracts\Admin;

interface HomeContract
{
    public function index();
    public function create();
    public function reviewApplication($id);
    public function isUndertakingAccept($data);
}
