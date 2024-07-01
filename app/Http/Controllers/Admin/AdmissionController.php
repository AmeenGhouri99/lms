<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdmissionDataTable;
use App\DataTables\UserDataTable;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
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
}
