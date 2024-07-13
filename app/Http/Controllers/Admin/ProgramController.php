<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\ProgramContract;
use App\DataTables\ProgramDataTable;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public $program;
    public function __construct(ProgramContract $program)
    {
        $this->program = $program;
    }
    public function index(ProgramDataTable $programDataTable)
    {
        try {
            return $programDataTable->render('admin.programs.index');
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('index programController ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
}
