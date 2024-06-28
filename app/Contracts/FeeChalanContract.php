<?php

namespace App\Contracts;

interface FeeChalanContract
{
    public function index($data);
    public function create();
    public function store($data);
    public function edit($id);
    public function show($id);
    public function update($data, $id);
    public function delete($id);
}
