<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'degree_exam_year',
        'image',
    ];
    /**
     * Get the user that owns the AcademicInformation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
