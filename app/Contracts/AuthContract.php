<?php

namespace App\Contracts;

interface AuthContract
{
    public function index();
    public function store($data);
    public function create();
    public function login($data);
}
