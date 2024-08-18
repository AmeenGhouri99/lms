<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
        'fsc_pre_eng_can_apply',
        'fsc_pre_med_can_apply',
        'diploma_can_apply',
        'fa_can_apply',
        'ics_can_apply',
        'merit',
        'fa_with_it_math_can_apply',
        'fa_simple_can_apply',
        'icom_can_apply',
        'ics_can_apply',
        'dae_chemical',
        'dae_mechanical',
        'dae_civil',
        'dae_electrical',
        'status',
        'is_entry_test_required',
        'is_university_test_required',
        'dae_chemical_with_60_percentage',
        'dae_electrical_with_60_percentage',
        'fsc_pre_eng_60_percentage_for_engineering_programs',
    ];

    // Define the relationship to get the parent program
    public function parent()
    {
        return $this->belongsTo(Program::class, 'parent_id');
    }

    // Define the relationship to get the child programs
    public function children()
    {
        return $this->hasMany(Program::class, 'parent_id');
    }
    public function secondChooseProgram(): HasMany
    {
        return $this->hasMany(Admission::class, 'second_program_id');
    }
    public function thirdChooseProgram(): HasMany
    {
        return $this->hasMany(Admission::class, 'third_program_id');
    }
    public function fourthChooseProgram(): HasMany
    {
        return $this->hasMany(Admission::class, 'fourth_program_id');
    }
}
