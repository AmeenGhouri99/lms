<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $user;
    public function __construct(UserContract $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        try {
            $user = $this->user->index();
            return view('user.home', compact('user'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('index userController ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $this->user->create();
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('index userController ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function reviewAdmissionApplication($id)
    {
        try {
            $user = $this->user->reviewApplication($id);
            if ($user === false) {
                return view('user.verify_and_submit.already_submit_application');
            }
            $admission_id = $id;
            session()->put('admission_id', $admission_id);
            return view('user.verify_and_submit.index', compact('user', 'admission_id'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('review & submit application in user Controller ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
    public function updateIsUndertakingAccept(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->isUndertakingAccept($request->all());
            DB::commit();
            flash('Congratulation! Your Application is Submitted Successfully')->success();
            return redirect()->route('user.review-application', ['id' => $user->id]);
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            DB::rollBack();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('update is undertaking accept in user Controller ', $request->all(), $e->getMessage());
            flash("Something Went Wrong!")->error();
            DB::rollBack();
            return back();
        }
    }
}
