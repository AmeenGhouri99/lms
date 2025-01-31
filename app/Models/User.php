<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'full_name',
        'cnic',
        'password',
        'father_name',
        'status',
        'profile_image'
        // 'degree_level_to_apply'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * Get all of the academicInformation for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualification(): HasMany
    {
        return $this->hasMany(AcademicInformation::class, 'user_id');
    }
    public function personalInformation(): HasOne
    {
        return $this->hasOne(PersonalInformation::class, 'user_id');
    }
    public function admission(): HasMany
    {
        return $this->hasMany(Admission::class, 'user_id');
    }
    public function document(): HasMany
    {
        return $this->hasMany(Document::class, 'user_id');
    }
    public function feeChalan(): HasMany
    {
        return $this->hasMany(FeeChalan::class, 'user_id');
    }
    /**
     * Get all of the firstChooseProgram for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appliedProgram(): HasMany
    {
        return $this->hasMany(AppliedProgram::class, 'user_id');
    }
}
