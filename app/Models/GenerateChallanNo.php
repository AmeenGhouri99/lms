<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateChallanNo extends Model
{
    use HasFactory;
    protected $table = 'challan_no_generate';
    protected $fillable = [
        'chalan_no',
        'abbreviation',
        'admission_id',
    ];
}
