<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $table = 'admission';

    protected $fillable = [
        'user_id',
        'first_program_id',
        'second_program_id',
        'third_program_id',
        'fourth_program_id',
        'session',
        'admission_date',
        'admission_status',
        'degree_level_applied_id',
        'admission_fee',
        'admission_amount',
    ];

    protected $attributes = [
        'admission_date' => null,
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->admission_date)) {
                $model->admission_date = Carbon::now()->toDateString();
            }
        });
    }
}
