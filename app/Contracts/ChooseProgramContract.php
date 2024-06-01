<?php

namespace App\Contracts;

interface ChooseProgramContract
{
    public function index($data);
    public function create();
    public function store($data);
    public function edit($id);
    public function update($data, $id);
    public function delete($id);
}
