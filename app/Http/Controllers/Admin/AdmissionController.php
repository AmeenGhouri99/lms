<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\AdmissionContract;
use App\DataTables\AdmissionDataTable;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAdmissionUpdateRequest;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class AdmissionController extends Controller
{
    public $admission;

    public function __construct(AdmissionContract $admission)
    {
        $this->admission = $admission;
    }
    public function index(AdmissionDataTable $userDataTable)
    {
        try {
            return $userDataTable->render('admin.admission.index');
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('index admin/usercontroller ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
    public function edit($id)
    {
        try {
            $admission = $this->admission->edit($id);
            return view('admin.admission.edit', compact('admission'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('edit admin Admission Controller ', 'id=' . $id, $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
    public function update(AdminAdmissionUpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->admission->update($request->prepareRequest(), $id);
            DB::commit();
            flash('Admission Record Updated Successfully.')->success();
            return back();
        } catch (CustomException $e) {
            DB::rollBack();
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            Helper::logMessage('update admin Admission ', $request->input(), $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
    public function destroy($id)
    {
        try {
            $program = $this->admission->delete($id);
            Flash::success('Admission Record deleted successfully.');
            return redirect()->route('admin.admissions.index');
        } catch (CustomException $th) {
            Flash::error($th->getMessage());
            return back();
        } catch (\Exception $th) {
            Helper::logMessage('admission delete', 'id=' . $id, $th->getMessage());
            Flash::error('Something went wrong!');
            return back();
        }
    }
    public function show($id)
    {
        try {
            $admission = $this->admission->edit($id);
            return view('admin.admission.show', compact('admission'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('edit admin Admission Controller ', 'id=' . $id, $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
}
