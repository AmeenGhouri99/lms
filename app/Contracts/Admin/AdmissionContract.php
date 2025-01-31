<?php

namespace App\Contracts\Admin;

interface AdmissionContract
{
    public function index();
    public function create();
    public function store($data);
    public function edit($id);
    public function update($data, $id);
    public function delete($id);
}
