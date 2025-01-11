<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\MeritListContract;
use App\DataTables\AdmissionDataTable;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAdmissionUpdateRequest;
use App\Http\Requests\MeritListRequest;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class MeritListController extends Controller
{
    public $merit_list;

    public function __construct(MeritListContract $merit_list)
    {
        $this->merit_list = $merit_list;
    }
    public function create()
    {
        try {

            $programs = $this->merit_list->create();
            return view('admin.merit_lists.index', compact('programs'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('create Merit List ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
    public function generateMeritList(MeritListRequest $request)
    {
        try {
            $merit_list = $this->merit_list->generateMeritList($request->prepareRequest());
            return view('admin.merit_lists.index', compact('merit_list'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('Merit List  Controller ', 'id=' . $request, $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
}
