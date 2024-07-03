<?php

namespace App\Services;

use App\Contracts\PersonalInformationContract;
use App\Exceptions\CustomException;
use App\Models\Domicile;
use App\Models\PersonalInformation;
use App\Models\State;
use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

class PersonalInformationService implements PersonalInformationContract
{
    use ImageUpload;
    public $personal_information;
    public $states_model;
    public $domicile_model;
    public function __construct()
    {
        $this->personal_information = new PersonalInformation();
        $this->states_model = new State();
        $this->domicile_model = new Domicile();
    }
    public function index()
    {
    }
    public function create()
    {
        $user_id = Auth::id();
        $user_personal_detail = $this->personal_information->where('user_id', $user_id)->first();
        if (!empty($user_personal_detail)) {
            return false;
            return redirect()->route('user.personal-information.edit', $user_id);
        }
        return view('user.personal_information.create');
    }
    public function edit($id)
    {
        $user_id = Auth::id();
        $user_personal_detail = $this->personal_information->where('user_id', $user_id)->first();
        return $user_personal_detail;
    }
    public function store($data)
    {
        $personal_information = $this->personal_information->where('user_id', $data['user_id'])->first();
        if (!empty($personal_information)) {
            throw new CustomException('Record Already Exist');
        }
        $model = new $this->personal_information;
        return $this->prepareData($model, $data, true);
    }
    public function update($data, $id)
    {
        // $personal_information = $this->personal_information->where('user_id', $data['user_id'])->first();
        // if (!empty($personal_information)) {
        //     throw new CustomException('Record Already Exist');
        // }
        $model = $this->personal_information->find($id);
        if (empty($model)) {
            throw new CustomException("User Not Exists!");
        }
        return $this->prepareData($model, $data, false);
    }
    private function prepareData($model, $data, $new_record = false)
    {
        if (isset($data['user_id']) && $data['user_id']) {
            $model->user_id = $data['user_id'];
        }

        if (isset($data['candidate_name']) && $data['candidate_name']) {
            $model->candidate_name = $data['candidate_name'];
        }

        if (isset($data['father_name']) && $data['father_name']) {
            $model->father_name = $data['father_name'];
        }

        if (isset($data['candidate_cnic']) && $data['candidate_cnic']) {
            $model->candidate_cnic = $data['candidate_cnic'];
        }

        if (isset($data['profile_image']) && $data['profile_image']) {
            // dd($data['profile_image']);
            // $model->profile_image = $data['profile_image'];
            $image_path = $this->upload($data['profile_image']);
            $model->profile_image = $image_path;
        }

        if (isset($data['guardian_father_cnic']) && $data['guardian_father_cnic']) {
            $model->guardian_father_cnic = $data['guardian_father_cnic'];
        }

        if (isset($data['guardian_father_occupation']) && $data['guardian_father_occupation']) {
            $model->guardian_father_occupation = $data['guardian_father_occupation'];
        }

        if (isset($data['guardian_father_monthly_income_in_rs']) && $data['guardian_father_monthly_income_in_rs']) {
            $model->guardian_father_monthly_income_in_rs = $data['guardian_father_monthly_income_in_rs'];
        }

        if (isset($data['annual_household_income']) && $data['annual_household_income']) {
            $model->annual_household_income = $data['annual_household_income'];
        }

        if (isset($data['religion']) && $data['religion']) {
            $model->religion = $data['religion'];
        }

        if (isset($data['hafiz_e_quran']) && $data['hafiz_e_quran']) {
            $model->hafiz_e_quran = $data['hafiz_e_quran'];
        }

        if (isset($data['disability']) && $data['disability']) {
            $model->disability = $data['disability'];
        }

        if (isset($data['gender']) && $data['gender']) {
            $model->gender = $data['gender'];
        }

        if (isset($data['dob']) && $data['dob']) {
            $model->dob = $data['dob'];
        }

        if (isset($data['country_id']) && $data['country_id']) {
            $model->country_id = $data['country_id'];
        }

        if (isset($data['province_id']) && $data['province_id']) {
            $model->state_id = $data['province_id'];
        }

        if (isset($data['domicile_id']) && $data['domicile_id']) {
            $model->domicile_id = $data['domicile_id'];
        }

        if (isset($data['phone_no']) && $data['phone_no']) {
            $model->phone_no = $data['phone_no'];
        }

        if (isset($data['email']) && $data['email']) {
            $model->email = $data['email'];
        }

        if (isset($data['address']) && $data['address']) {
            $model->address = $data['address'];
        }

        if (isset($data['permanent_address']) && $data['permanent_address']) {
            $model->permanent_address = $data['permanent_address'];
        }
        $model->save();
        return $model;
    }
    public function getStates($data)
    {
        $model = $this->states_model->where('country_id', $data['country_id'])->get();
        return $model;
    }
    public function getDomicile($data)
    {
        $model = $this->domicile_model->where('state_id', $data['state_id'])->get();
        return $model;
    }
}
