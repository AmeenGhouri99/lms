<?php

namespace App\Http\Controllers;

use App\Contracts\PersonalInformationContract;
use App\Exceptions\CustomException;
use Illuminate\Http\Request;

class UserPersonalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $personal_information;
    public function __construct(PersonalInformationContract $personal_information)
    {
        $this->personal_information = $personal_information;
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
            return $this->personal_information->create();
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
}
