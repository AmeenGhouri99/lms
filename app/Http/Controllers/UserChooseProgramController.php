<?php

namespace App\Http\Controllers;

use App\Contracts\ChooseProgramContract;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Requests\CreateChooseProgramRequest;
use App\Http\Requests\UpdateAcademicInformationRequest;
use App\Models\Admission;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Event\Test\MockObjectCreated;

class UserChooseProgramController extends Controller
{
    public $user_choose_program;
    public function __construct(ChooseProgramContract $user_choose_program)
    {
        $this->user_choose_program = $user_choose_program;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {
            $programs = $this->user_choose_program->index($request);

            $groupedPrograms = $programs->groupBy('parent_id')->map(function ($group) {
                return [
                    'title' => $group->first()->parent->name, // Assuming each program has a parent relationship to fetch the title
                    'programs' => $group->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'name' => $item->name,
                        ];
                    })
                ];
            });
            return response()->json(['data' => $groupedPrograms]);
        } catch (CustomException $e) {
            return $this->failedResponse($e->getMessage());
        } catch (\Exception $e) {
            Helper::logMessage('personal Information create ', 'none', $e->getMessage());
            return $this->failedResponse('Something went wrong!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $degree_levels = $this->user_choose_program->create();
            $applied_programs = Admission::where('user_id', Auth::id())->get();

            return view('user.choose_to_apply.create', compact('degree_levels', 'applied_programs'));
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
    public function store(CreateChooseProgramRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->user_choose_program->store($request->prepareRequest());
            DB::commit();
            flash('Program Saved Successfully.')->success();
            return back();
            // return redirect()->route('user.academic-information.create');
        } catch (CustomException $th) {
            DB::rollback();
            flash($th->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Helper::logMessage('Program choose store ', $request->input(), $e->getMessage());
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
            $academic_detail = $this->user_choose_program->edit($id);
            $user_id = Auth::id();
            $academic_details = Program::where('user_id', $user_id)->get();
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
            $this->user_choose_program->update($request->prepareRequest(), $id);
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
            $this->user_choose_program->delete($id);
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