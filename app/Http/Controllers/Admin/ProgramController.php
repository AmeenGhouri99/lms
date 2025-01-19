<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\ProgramContract;
use App\DataTables\ProgramDataTable;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

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
    public function create()
    {
        try {
            $parent_programs = $this->program->create();
            // dd($parent_programs);
            return view('admin.programs.create', compact('parent_programs'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('create pro
            gramController ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
    public function edit($id)
    {
        try {
            $program = $this->program->edit($id);
            $parent_programs = Program::where('parent_id', null)->pluck('name', 'id');

            return view('admin.programs.edit', compact('parent_programs', 'program'));
        } catch (CustomException $th) {
            Flash::error($th->getMessage());
            return back();
        } catch (\Exception $th) {
            Helper::logMessage('program edit', 'id=' . $id, $th->getMessage());
            Flash::error('Something went wrong!');
            return back();
        }
    }
    public function store(CreateProgramRequest $request)
    {
        try {
            DB::beginTransaction();
            $program = $this->program->store($request->prepareRequest());
            DB::commit();
            Flash::success('Program Saved Successfully.');
            // if ($program->deleted_at === null) {
            //     return redirect()->route('admin.programs.index');
            // }
            return back();
        } catch (CustomException $th) {
            DB::rollBack();
            Flash::error($th->getMessage());
            return back();
        } catch (\Exception $th) {
            DB::rollBack();
            Helper::logMessage('program create', $request->input(), $th->getMessage());
            Flash::error('Something went wrong!');
            return back();
        }
    }
    public function update(UpdateProgramRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $program = $this->program->update($request->prepareRequest(), $id);
            DB::commit();
            Flash::success('Program Record Updated Successfully.');
            // if ($program->deleted_at === null) {
            //     return redirect()->route('admin.programs.index');
            // }
            return back();
        } catch (CustomException $th) {
            DB::rollBack();
            Flash::error($th->getMessage());
            return back();
        } catch (\Exception $th) {
            DB::rollBack();
            Helper::logMessage('program update', $request->input(), $th->getMessage());
            Flash::error('Something went wrong!');
            return back();
        }
    }
    // public function show()
    // {
    //     dd('ok');
    // }
    public function destroy($id)
    {
        try {
            $program = $this->program->delete($id);
            Flash::success('Program deleted successfully.');
            return back();
        } catch (CustomException $th) {
            Flash::error($th->getMessage());
            return back();
        } catch (\Exception $th) {
            Helper::logMessage('program delete', 'id=' . $id, $th->getMessage());
            Flash::error('Something went wrong!');
            return back();
        }
    }
}
