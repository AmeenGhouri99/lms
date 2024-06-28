<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppliedProgram extends Model
{
    use HasFactory;
    protected $table = 'applied_programs';
    protected $fillable = [
        'user_id',
        'admission_id',
        'program_id',
        'degree_level_applied_id'
    ];
    /**
     * Get the user that owns the AppliedProgam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function admission(): BelongsTo
    {
        return $this->belongsTo(Admission::class, 'admission_id');
    }
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
    public function appliedDegreeLevel(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'degree_level_applied_id');
    }
}
