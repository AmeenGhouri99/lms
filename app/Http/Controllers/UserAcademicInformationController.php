<?php

namespace App\Http\Controllers;

use App\Contracts\AcademicInformationContract;
use App\Exceptions\CustomException;
use Illuminate\Http\Request;

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
            return $this->academic_information->create();
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
