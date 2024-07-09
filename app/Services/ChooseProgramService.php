<?php

namespace App\Services;

use App\Contracts\ChooseProgramContract;
use App\Exceptions\CustomException;
use App\Helpers\Constant;
use App\Models\Program;
use App\Models\AcademicInformation;
use App\Models\Admission;
use App\Models\AppliedProgram;
use App\Models\GenerateChallanNo;
use Illuminate\Support\Facades\Auth;

class ChooseProgramService implements ChooseProgramContract
{
    public $choose_program;
    public $admission;
    public $user_academic_detail;
    public $applied_program;
    public $challan_no_generate;

    public function __construct()
    {
        $this->choose_program = new Program();
        $this->admission = new Admission();
        $this->user_academic_detail = new AcademicInformation();
        $this->applied_program = new AppliedProgram();
        $this->challan_no_generate = new GenerateChallanNo();
    }
    public function index($data)
    {
        $user_intermediate_degrees = $this->user_academic_detail->where('user_id', Auth::id())->where('qualification', '!=', 'matriculation')->get();
        // Iterate through the user intermediate degrees
        foreach ($user_intermediate_degrees as $user_intermediate_degree) {

            if ($user_intermediate_degree->qualification === Constant::FA_SIMPLE) {
                $count = $this->choose_program->with('parent')->where('fa_simple_can_apply', 1)->where('parent_id', $data['program'])->get();
                if (!$count->count() > 0) {
                    throw new CustomException('No Program Found!');
                }
                return $count;
            }
            if ($user_intermediate_degree->qualification === Constant::FA_WITH_MATH_IT) {
                $count = $this->choose_program->with('parent')->where('fa_with_it_math_can_apply', 1)->where('parent_id', $data['program'])->get();
                if (!$count->count() > 0) {
                    throw new CustomException('No Program Found!');
                }
                return $count;
            }
            if ($user_intermediate_degree->qualification === Constant::FSC_PRE_MEDICAL) {
                $count = $this->choose_program->with('parent')->where('fsc_pre_medical_can_apply', 1)->where('parent_id', $data['program'])->get();
                if (!$count->count() > 0) {
                    throw new CustomException('No Program Found!');
                }
                return $count;
            }

            if ($user_intermediate_degree->qualification === Constant::FSC_PRE_ENGINEERING) {
                $percentage = round($user_intermediate_degree->obtained_marks / $user_intermediate_degree->total_marks * 100);
                if ($percentage < 60) {
                    $count = $this->choose_program->with('parent')->where('parent_id', $data['program'])->where('fsc_pre_eng_60_percentage_for_engineering_programs', 1)->where('parent_id', $data['program'])->get();
                    if (!$count->count() > 0) {
                        throw new CustomException('No Program Found!');
                    }
                    return $count;
                } else {
                    $count = $this->choose_program->with('parent')->where('parent_id', $data['program'])->get();
                    if (!$count->count() > 0) {
                        throw new CustomException('No Program Found!');
                    }
                    return $count;
                }
            }
            if ($user_intermediate_degree->qualification === Constant::DAE_CIVIL) {
                $count = $this->choose_program->with('parent')->where('dae_civil', 1)->where('parent_id', $data['program'])->get();
                if (!$count->count() > 0) {
                    throw new CustomException('No Program Found!');
                }
                return $count;
            }
            if ($user_intermediate_degree->qualification === Constant::DAE_CHEMICAL) {
                $count = $this->choose_program->with('parent')->where('dae_chemical', 1)->where('parent_id', $data['program'])->get();
                if (!$count->count() > 0) {
                    throw new CustomException('No Program Found!');
                }
                return $count;
            }
            if ($user_intermediate_degree->qualification === Constant::DAE_ELECTRICAL) {
                $count = $this->choose_program->with('parent')->where('dae_electrical', 1)->where('parent_id', $data['program'])->get();
                if (!$count->count() > 0) {
                    throw new CustomException('No Program Found!');
                }
                return $count;
            }
            if ($user_intermediate_degree->qualification === Constant::DAE_MECHANICAL) {
                $count = $this->choose_program->with('parent')->where('dae_mechanical', 1)->where('parent_id', $data['program'])->get();
                if (!$count->count() > 0) {
                    throw new CustomException('No Program Found!');
                }
                return $count;
            }
            if ($user_intermediate_degree->qualification === Constant::ICS) {
                $count = $this->choose_program->with('parent')->where('ics_can_apply', 1)->where('parent_id', $data['program'])->get();
                if (!$count->count() > 0) {
                    throw new CustomException('No Program Found!');
                }
                return $count;
            }
            if ($user_intermediate_degree->qualification === Constant::ICOM) {
                $count = $this->choose_program->with('parent')->where('icom_can_apply', 1)->where('parent_id', $data['program'])->get();
                if (!$count->count() > 0) {
                    throw new CustomException('No Program Found!');
                }
                return $count;
            }
        }
        // if (empty($model)) {
        //     throw new CustomException('Not Found!');
        // }
        // return $model;
    }
    public function create()
    {
        $user_id = Auth::id();

        $exist_academic_records = $this->user_academic_detail->where('user_id', $user_id)->get();
        if (empty($exist_academic_records->count() > 1)) {
            throw new CustomException('Please Add Your Academic Details');
        }
        $degree_levels = $this->choose_program->where('parent_id', null)->get();
        return $degree_levels;
    }
    public function edit($id)
    {
        $user_academic_detail = $this->choose_program->find($id);
        return $user_academic_detail;
    }
    public function store($data)
    {
        // $record_exists = $this->admission->where('user_id', $data['user_id'])
        //     ->where('first_program_id', $data['programs'][0])
        //     ->orWhere('second_program_id', $data['programs'][1] ?? null)
        //     ->orWhere('third_program_id', $data['programs'][2] ?? null)
        //     ->orWhere('fourth_program_id', $data['programs'][3] ?? null)->first();
        // if (!empty($record_exists)) {
        //     throw new CustomException('You have already applied in Once');
        // }
        foreach ($data['programs'] as $program) {
            $record_exists = $this->applied_program->where('program_id', $program)->where('user_id', Auth::id())->first();
            if (!empty($record_exists)) {
                throw new CustomException('You have already applied in this' . $record_exists->program->name);
            }
        }
        $model = new $this->admission;
        return $this->prepareData($model, $data, true);
    }
    public function update($data, $id)
    {
        // $choose_program = $this->choose_program->where('user_id', $data['user_id'])->first();
        // if (!empty($choose_program)) {
        //     throw new CustomException('Record Already Exist');
        // }
        $model = $this->choose_program->find($id);
        if (empty($model)) {
            throw new CustomException("Record Not Exists!");
        }
        return $this->prepareData($model, $data, false);
    }
    public function delete($id)
    {
        $user_academic_detail = $this->admission->where('user_id', Auth::id())->find($id);
        if (!$user_academic_detail->count() > 0) {
            throw new CustomException('Record Not Exists!');
        }
        return $user_academic_detail->delete();;
    }
    private function prepareData($model, $data, $new_record = false)
    {
        if (isset($data['user_id']) && $data['user_id']) {
            $model->user_id = $data['user_id'];
        }
        if (isset($data['e-cat_roll_no']) && $data['e-cat_roll_no']) {
            $model->e_cat_roll_no = $data['e-cat_roll_no'];
        }
        if (isset($data['e-cat_obtained_marks']) && $data['e-cat_obtained_marks']) {
            $model->e_cat_obtained_marks = $data['e-cat_obtained_marks'];
        }
        if (isset($data['e-cat_total_marks']) && $data['e-cat_total_marks']) {
            $model->e_cat_total_marks = $data['e-cat_total_marks'];
        }
        if (isset($data['is_e_cat_attempt']) && $data['is_e_cat_attempt']) {
            $model->is_e_cat_attempt = $data['is_e_cat_attempt'];
        }
        $model->admission_start_date = settings('admission_start_date');
        $model->admission_end_date = settings('admission_end_date');
        $model->admission_term = settings('admission_term');
        $model->admission_amount = settings('admission_fee');

        $model->save();
        if (isset($data['programs']) && $data['programs']) {
            foreach ($data['programs'] as $program) {
                $applied_program_model = new $this->applied_program;
                $applied_program_model->admission_id = $model->id;
                $applied_program_model->user_id = $data['user_id'];
                $applied_program_model->program_id = $program;
                $applied_program_model->degree_level_applied_id = $data['degree_level_applied_id'];
                $applied_program_model->save();
            }
        }
        if ($new_record) {
            $check_existing_chalan_no = $this->challan_no_generate->latest()->first();
            if (!empty($check_existing_chalan_no)) {
                $challan_no = $check_existing_chalan_no->chalan_no + 1;
                $challan_no_generate_model = new $this->challan_no_generate;
                $challan_no_generate_model->admission_id = $model->id;
                $challan_no_generate_model->chalan_no = $challan_no;
                $challan_no_generate_model->abbreviation = $check_existing_chalan_no->abbreviation;
                $challan_no_generate_model->save();
            }
        }
        return $model;
    }
}
