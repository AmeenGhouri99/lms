<?php

namespace App\Http\Controllers;

use App\Contracts\FeeChalanContract;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Requests\CreateFeeChalanRequest;
use App\Http\Requests\UpdateAcademicInformationRequest;
use App\Models\AcademicInformation;
use App\Models\Admission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeeChalanController extends Controller
{
    public $fee_chalan;
    public function __construct(FeeChalanContract $fee_chalan)
    {
        $this->fee_chalan = $fee_chalan;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFeeChalanRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->fee_chalan->store($request->prepareRequest());
            DB::commit();
            flash('Chalan Information Saved Successfully.')->success();
            return redirect()->route('user.pay-admission-fee.create');
        } catch (CustomException $th) {
            DB::rollback();
            flash($th->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Helper::logMessage('Fee Chalan store ', $request->input(), $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $this->fee_chalan->show($id);
            $admission_detail  = Admission::find($id);
            return view('user.choose_to_apply.pay_admission_fee', compact('admission_detail'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return redirect()->route('user.personal-information.create');
        } catch (\Exception $e) {
            Helper::logMessage('chalan create ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $academic_detail = $this->fee_chalan->edit($id);
            $user_id = Auth::id();
            $academic_details = AcademicInformation::where('user_id', $user_id)->get();
            return view('user.academic.edit', compact(['academic_detail', 'academic_details']));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('academic Information edit ', 'id=' . $id, $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAcademicInformationRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $this->fee_chalan->update($request->prepareRequest(), $id);
            DB::commit();
            flash('Academic Information Updated Successfully.')->success();
            return redirect()->route('user.academic-information.create');
        } catch (CustomException $th) {
            DB::rollback();
            flash($th->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Helper::logMessage('academic Information Update ', $request->input(), $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->fee_chalan->delete($id);
            flash('Academic Record Deleted Successfully!')->success();
            return redirect()->route('user.academic-information.create');
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('academic Information delete ', 'id=' . $id, $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
}