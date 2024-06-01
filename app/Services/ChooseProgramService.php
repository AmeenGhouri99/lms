<?php

namespace App\Services;

use App\Contracts\ChooseProgramContract;
use App\Exceptions\CustomException;
use App\Helpers\Constant;
use App\Models\Program;
use App\Models\AcademicInformation;
use Illuminate\Support\Facades\Auth;

class ChooseProgramService implements ChooseProgramContract
{
    public $choose_program;
    public $user_academic_detail;
    public function __construct()
    {
        $this->choose_program = new Program();
        $this->user_academic_detail = new AcademicInformation();
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
        $user_intermediate_degree = $this->user_academic_detail->where('user_id', $user_id)->get(['id', 'qualification', 'user_id']);

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
        $model = new $this->choose_program;
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
        $user_academic_detail = $this->choose_program->where('user_id', Auth::id())->find($id);
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

        if (isset($data['qualification']) && $data['qualification']) {
            $model->qualification = $data['qualification'];
        }

        if (isset($data['board_university_name']) && $data['board_university_name']) {
            $model->board_university_name = $data['board_university_name'];
        }

        if (isset($data['roll_no']) && $data['roll_no']) {
            $model->roll_no = $data['roll_no'];
        }

        if (isset($data['degree_exam_year']) && $data['degree_exam_year']) {
            $model->degree_exam_year = $data['degree_exam_year'];
        }

        if (isset($data['total_marks']) && $data['total_marks']) {
            $model->total_marks = $data['total_marks'];
        }

        if (isset($data['obtained_marks']) && $data['obtained_marks']) {
            $model->obtained_marks = $data['obtained_marks'];
        }
        $model->save();
        return $model;
    }
}
