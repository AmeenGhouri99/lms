<?php

namespace App\Services\Admin;

use App\Contracts\Admin\ProgramContract;
use App\Exceptions\CustomException;
use App\Models\FeeChalan;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProgramService implements ProgramContract
{
    public $pdf;
    public $user;
    public $program;
    public function __construct()
    {
        $this->pdf = new FeeChalan();
        $this->user = new User();
        $this->program  = new Program();
    }
    public function index() {}
    public function create()
    {
        $parent_programs = $this->program->where('parent_id', null)->pluck('name', 'id');
        return $parent_programs;
    }
    public function edit($id)
    {
        $program = $this->program->find($id);
        return $program;
    }
    public function store($data)
    {
        $model = new $this->program;
        return $this->prepareData($model, $data, true);
    }
    public function update($data, $id)
    {
        // $document = $this->document->where('user_id', $data['user_id'])->first();
        // if (!empty($document)) {
        //     throw new CustomException('Record Already Exist');
        // }
        $model = $this->program->find($id);
        if (empty($model)) {
            throw new CustomException("Record Not Exists!");
        }
        return $this->prepareData($model, $data, false);
    }
    public function delete($id)
    {
        $document = $this->pdf->where('user_id', Auth::id())->find($id);
        if (!$document->count() > 0) {
            throw new CustomException('Record Not Exists!');
        }
        return $document->delete();;
    }
    private function prepareData($model, $data, $new_record = false)
    {
        if (isset($data['name']) && $data['name']) {
            $model->name = $data['name'];
        }
        if (isset($data['parent_id']) && $data['parent_id']) {
            $model->parent_id = $data['parent_id'];
        }
        // Field: fsc_pre_eng_can_apply
        if (isset($data['fsc_pre_eng_can_apply'])) {
            $model->fsc_pre_eng_can_apply = $data['fsc_pre_eng_can_apply'];
        }

        // Field: fsc_pre_eng_60_percentage_for_engineering_programs
        if (isset($data['fsc_pre_eng_60_percentage_for_engineering_programs'])) {
            $model->fsc_pre_eng_60_percentage_for_engineering_programs = $data['fsc_pre_eng_60_percentage_for_engineering_programs'];
        }

        // Field: fsc_pre_med_can_apply
        if (isset($data['fsc_pre_med_can_apply'])) {
            $model->fsc_pre_med_can_apply = $data['fsc_pre_med_can_apply'];
        }

        // Field: dae_chemical
        if (isset($data['dae_chemical'])) {
            $model->dae_chemical = $data['dae_chemical'];
        }

        // Field: dae_mechanical
        if (isset($data['dae_mechanical'])) {
            $model->dae_mechanical = $data['dae_mechanical'];
        }

        // Field: dae_civil
        if (isset($data['dae_civil'])) {
            $model->dae_civil = $data['dae_civil'];
        }

        // Field: dae_electrical
        if (isset($data['dae_electrical'])) {
            $model->dae_electrical = $data['dae_electrical'];
        }

        // Field: dae_chemical_with_60_percentage
        if (isset($data['dae_chemical_with_60_percentage'])) {
            $model->dae_chemical_with_60_percentage = $data['dae_chemical_with_60_percentage'];
        }

        // Field: dae_electrical_with_60_percentage
        if (isset($data['dae_electrical_with_60_percentage'])) {
            $model->dae_electrical_with_60_percentage = $data['dae_electrical_with_60_percentage'];
        }

        // Field: fa_simple_can_apply
        if (isset($data['fa_simple_can_apply'])) {
            $model->fa_simple_can_apply = $data['fa_simple_can_apply'];
        }

        // Field: fa_with_it_math_can_apply
        if (isset($data['fa_with_it_math_can_apply'])) {
            $model->fa_with_it_math_can_apply = $data['fa_with_it_math_can_apply'];
        }

        // Field: icom_can_apply
        if (isset($data['icom_can_apply'])) {
            $model->icom_can_apply = $data['icom_can_apply'];
        }

        // Field: ics_can_apply
        if (isset($data['ics_can_apply'])) {
            $model->ics_can_apply = $data['ics_can_apply'];
        }

        // Field: merit
        if (isset($data['merit'])) {
            $model->merit = $data['merit'];
        }

        // Field: status
        if (isset($data['status'])) {
            $model->status = $data['status'];
        }

        // Field: is_entry_test_required
        if (isset($data['is_entry_test_required'])) {
            $model->is_entry_test_required = $data['is_entry_test_required'];
        }

        // Field: is_university_test_required
        if (isset($data['is_university_test_required'])) {
            $model->is_university_test_required = $data['is_university_test_required'];
        }

        $model->save();
        return $model;
    }
}
