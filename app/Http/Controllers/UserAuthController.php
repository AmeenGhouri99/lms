<?php

namespace App\Http\Controllers;

use App\Contracts\AuthContract;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Requests\CreateRegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAuthController extends Controller
{
    public $user;
    public function __construct(AuthContract $user)
    {
        $this->user = $user;
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
    public function store(CreateRegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->user->store($request->prepareRequest());
            DB::commit();
            return "Your account register Successfully!";
        } catch (CustomException $th) {
            DB::rollBack();
            return $th->getMessage();
        } catch (\Exception $e) {
            DB::rollBack();
            Helper::logMessage('register store', $request->input(), $e->getMessage());
            return "something Went Wrong!";
            return back();
        }
    }
    public function login(LoginRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->user->login($request->prepareRequest());
            DB::commit();
            return view('user.personal_information.create');
        } catch (CustomException $th) {
            DB::rollBack();
            return $th->getMessage();
        } catch (\Exception $e) {
            DB::rollBack();
            Helper::logMessage('login ', $request->input(), $e->getMessage());
            return "something Went Wrong!";
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
}
