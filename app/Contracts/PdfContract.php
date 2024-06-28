<?php

namespace App\Contracts;

interface PdfContract
{
    public function index();
    public function create($id);
    public function store($data);
    public function edit($id);
    public function update($data, $id);
    public function delete($id);
}