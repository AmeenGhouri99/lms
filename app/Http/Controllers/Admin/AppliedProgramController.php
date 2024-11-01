<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\AppliedProgramContract;
use App\DataTables\AppliedProgramDataTable;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAppliedProgramUpdateRequest;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class AppliedProgramController extends Controller
{
    public $appliedProgram;

    public function __construct(AppliedProgramContract $appliedProgram)
    {
        $this->appliedProgram = $appliedProgram;
    }

    public function edit($id)
    {
        try {
            $appliedProgram = $this->appliedProgram->edit($id);
            return view('admin.appliedProgram.edit', compact('appliedProgram'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('edit admin AppliedProgram Controller ', 'id=' . $id, $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
    public function update(AdminAppliedProgramUpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->appliedProgram->update($request->prepareRequest(), $id);
            DB::commit();
            flash('AppliedProgram Record Updated Successfully.')->success();
            return back();
        } catch (CustomException $e) {
            DB::rollBack();
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            Helper::logMessage('update admin AppliedProgram ', $request->input(), $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            $program = $this->appliedProgram->delete($id);
            Flash::success('AppliedProgram Record deleted successfully.');
            return redirect()->route('admin.appliedPrograms.index');
        } catch (CustomException $th) {
            Flash::error($th->getMessage());
            return back();
        } catch (\Exception $th) {
            Helper::logMessage('appliedProgram delete', 'id=' . $id, $th->getMessage());
            Flash::error('Something went wrong!');
            return back();
        }
    }
    public function show($id)
    {
        try {
            $appliedProgram = $this->appliedProgram->edit($id);
            // if ($user === false) {
            //     return view('user.verify_and_submit.already_submit_application');
            // }
            $appliedProgram_id = $id;
            $user = $appliedProgram->user;
            // session()->put('appliedProgram_id', $appliedProgram_id);
            return view('admin.appliedProgram.show', compact('user', 'appliedProgram_id'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('review & submit application in user Controller ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
}
