<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicInformation extends Model
{
    use HasFactory;
    protected $table = 'academic_information';
    protected $fillable = [
        'user_id',
        'qualification',
        'board_university_name',
        'roll_no',
        'total_marks',
        'obtained_marks',
        'degree_exam_year'
    ];
}
