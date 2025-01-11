<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Admission extends Model
{
    use HasFactory;

    protected $table = 'admission';

    protected $fillable = [
        'user_id',
        'session',
        'admission_date',
        'admission_status',
        'degree_level_applied_id',
        'admission_fee',
        'admission_amount',
        'is_undertaking_accept',
        'admission_end_date',
        'admission_start_date',
        'admission_term',
        'e_cat_roll_no',
        'e_cat_obtained_marks',
        'e_cat_total_marks',
        "is_e_cat_attempt",
        "voucher_no"
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
    /**
     * Get the user that owns the Admission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function program(): HasMany
    {
        return $this->hasMany(AppliedProgram::class, 'admission_id');
    }
    public function admissionFee(): HasOne
    {
        return $this->hasOne(FeeChalan::class, 'admission_id');
    }
}
