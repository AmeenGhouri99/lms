<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSettingRequest;

class SettingsController extends Controller
{
    public function create()
    {
        return view('admin.settings.edit');
    }

    public function store(CreateSettingRequest $request)
    {
        if (!empty($request->admission_fee)) {
            settings()->set([
                'admission_fee' => $request->admission_fee,
            ]);
        }
        if (!empty($request->admission_term)) {
            settings()->set([
                'admission_term' => $request->admission_term,
            ]);
        }
        if (!empty($request->admission_start_date)) {
            settings()->set([
                'admission_start_date' => $request->admission_start_date,
            ]);
        }
        if (!empty($request->admission_end_date)) {
            settings()->set([
                'admission_end_date' => $request->admission_end_date,
            ]);
        }
        if (!empty($request->university_entry_test)) {
            settings()->set([
                'university_entry_test' => $request->university_entry_test,
            ]);
        }
        if (!empty($request->admission_picture)) {
            settings()->set([
                'admission_picture' => $request->file('admission_picture')->store('images', ['disk' => 'public']),
            ]);
        }
        flash('Setting Information Updated Successfully')->success();
        return redirect()->back();
    }
}