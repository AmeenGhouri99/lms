<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Program extends Model
{
    protected $fillable = [
        'name', 'parent_id', 'fsc_pre_eng_can_apply', 'fsc_pre_med_can_apply',
        'diploma_can_apply', 'fa_can_apply', 'ics_can_apply', 'merit',
        'status', 'is_entry_test_required', 'is_university_test_required', 'dae_chemical_with_60_percentage', 'fsc_pre_eng_60_percentage_for_engineering_programs', 'dae_electrical_with_60_percentage'
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
}
