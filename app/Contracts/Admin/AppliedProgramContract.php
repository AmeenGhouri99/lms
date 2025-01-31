<?php

namespace App\Contracts\Admin;

interface AppliedProgramContract
{
    public function edit($id);
    public function update($data, $id);
    public function delete($id);
}
