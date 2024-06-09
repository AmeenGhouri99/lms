<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return $this->user->create();
        } catch (CustomException $e) {
            return $this->$e->getMessage();
        } catch (\Exception $e) {
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
    public function reviewAdmissionApplication()
    {
        try {
            $user = $this->user->reviewApplication();
            return view('user.verify_and_submit.index', compact('user'));
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
