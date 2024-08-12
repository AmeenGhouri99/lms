<?php

namespace App\Contracts\Admin;

interface UserContract
{
    public function index();
    public function edit($id);
    public function update($data, $id);
    public function delete($id);
}
