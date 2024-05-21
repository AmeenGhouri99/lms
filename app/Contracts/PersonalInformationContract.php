<?php

namespace App\Contracts;

interface PersonalInformationContract
{
    public function index();
    public function create();
    public function store($data);
    public function edit($id);
    public function update($data, $id);
}
