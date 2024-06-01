<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $table = 'admission';
    protected $fillable = [
        'user_id',
        'program_id',
        'session',
        'admission_date'
    ];
}
