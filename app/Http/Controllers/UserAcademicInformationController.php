<?php

namespace App\Http\Controllers;

use App\Contracts\AcademicInformationContract;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Requests\CreateAcademicInformationRequest;
use App\Http\Requests\UpdateAcademicInformationRequest;
use App\Models\AcademicInformation;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAcademicInformationController extends Controller
{
    public $academic_information;
    public function __construct(AcademicInformationContract $academic_information)
    {
        $this->academic_information = $academic_information;
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
        try {
            $academic_details = $this->academic_information->create();
            return view('user.academic.create', compact('academic_details'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return redirect()->route('user.personal-information.create');
        } catch (\Exception $e) {
            Helper::logMessage('personal Information create ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAcademicInformationRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->academic_information->store($request->prepareRequest());
            DB::commit();
            flash('Academic Information Saved Successfully.')->success();
            return redirect()->route('user.academic-information.create');
        } catch (CustomException $th) {
            DB::rollback();
            flash($th->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Helper::logMessage('personal Information store ', $request->input(), $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $academic_detail = $this->academic_information->edit($id);
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
            $this->academic_information->update($request->prepareRequest(), $id);
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
            $this->academic_information->delete($id);
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
