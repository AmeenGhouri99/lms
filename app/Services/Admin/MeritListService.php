<?php

namespace App\Services\Admin;

use App\Contracts\Admin\Merit_listContract;
use App\Contracts\Admin\MeritListContract;
use App\Exceptions\CustomException;
use App\Models\Admission;
use App\Models\AppliedProgram;
use App\Models\FeeChalan;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MeritListService implements MeritListContract
{
    public $program;
    public $applied_program;

    public function __construct()
    {
        $this->program = new Program();
        $this->applied_program = new AppliedProgram();
    }
    public function create()
    {
        $programs = $this->program->where('parent_id', '!=', null)->pluck('name', 'id');
        return $programs;
    }
    public function generateMeritList($data)
    {
        $merit_list = $this->applied_program
            ->where('program_id', $data['program_id'])
            ->with(['admission' => function ($query) {
                $query->where('admission_fee', 'paid')
                    ->with(['user' => function ($q) {
                        $q->with(['qualification' => function ($qualification) {
                            $qualification->whereIn('qualification', [
                                'fa_simple',
                                'fsc_pre_engineering',
                                'fsc_pre_medical',
                                'dae_civil',
                                'dae_mechanical',
                                'dae_chemical',
                                'ics',
                                'icom',
                                'fa_with_math'
                            ])->orderBy('obtained_marks', 'desc');
                        }]);
                    }]);
            }])->get();

        foreach ($merit_list as $merit) {
            if (!empty($merit->admission)) {
                // dd($merit->admission->user);
                // foreach ($merit->admission as $admission) {
                // $data = [];
                $percentage = $merit->admission->user->qualification->WhereIn('qualification', [
                    'fsc_pre_engineering',
                    'fsc_pre_medical',
                    'dae_civil',
                    'dae_mechanical',
                    'dae_chemical',
                    'ics',
                    'icom',
                    'fa_with_math',
                    'fa_simple'
                ])->first();

                $data = [
                    'Candidate Name' => $merit->admission->user->personalInformation->candidate_name,
                    'Father Name' => $merit->admission->user->personalInformation->father_name,
                    'Phone no' => $merit->admission->user->personalInformation->phone_no,
                    'Candidate CNIC' => $merit->admission->user->personalInformation->candidate_cnic,
                    'Merit' => intval(($percentage->obtained_marks / $percentage->total_marks) * 100) . '%'
                ];
                dd($data);
            } else {
                echo "No admission data found for this program.\n";
            }
        }

        return $merit_list;
    }
}
