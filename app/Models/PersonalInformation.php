<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function domicile(): BelongsTo
    {
        return $this->belongsTo(Domicile::class, 'domicile_id');
    }
}
