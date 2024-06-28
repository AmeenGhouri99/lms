<?php

namespace App\Services\Admin;

use App\Contracts\Admin\HomeContract;
use App\Helpers\Constant;
use App\Models\Admission;
use App\Models\FeeChalan;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeService implements HomeContract
{
    public $user;
    public $admission_model;
    public $program_model;
    public $fee_challan_model;
    public function __construct()
    {
        $this->user = new User();
        $this->admission_model = new Admission();
        $this->program_model = new Program();
        $this->fee_challan_model = new FeeChalan();
    }
    public function index()
    {
        $total_admissions = $this->admission_model->where('is_undertaking_accept', 1)->get();
        $total_programs = $this->program_model->where('parent_id', null)->get();
        $total_users = $this->user->with(['personalInformation', 'qualification', 'admission', 'document', 'feeChalan'])->where('role_id', Constant::USER_ROLE_ID)->get();
        $total_fee_chalan = $this->fee_challan_model->get();
        $data = [
            'users' => $total_users,
            'programs' => $total_programs,
            'admissions' => $total_admissions,
            'fee_challans' => $total_fee_chalan,
        ];
        return $data;
    }
    public function create()
    {
        // dd("ok");
        return view('user.personal_information.create');
    }
    public function reviewApplication($id)
    {
        $model = $this->user->with(['personalInformation', 'qualification', 'admission' => function ($query) use ($id) {
            $query->where('id',  $id);
        }, 'document', 'feeChalan'])->find(Auth::id());
        return $model;
    }

    public function isUndertakingAccept($data)
    {
        // dd($data);
        $admission_model = $this->admission_model->find($data['admission_id']);
        // dd($admission_model);
        $admission_model->update([
            'is_undertaking_accept' => $data['accept_all']
        ]);
        return $admission_model;
    }
}
