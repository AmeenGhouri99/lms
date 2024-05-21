<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;
    protected $table = 'personal_information';
    protected $fillable = [
        'user_id',
        'candidate_name',
        'father_name',
        'candidate_cnic',
        'profile_image',
        'guardian_father_cnic',
        'guardian_father_occupation',
        'guardian_father_monthly_income_in_rs',
        'annual_household_income',
        'religion',
        'hafiz_e_quran',
        'disability',
        'gender',
        'dob',
        'country_id',
        'state_id',
        'domicile',
        'phone_no',
        'email',
        'address',
        'permanent_address',
    ];
}
