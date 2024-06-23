<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domicile extends Model
{
    use HasFactory;

    protected $table = 'domiciles';

    protected $fillable = [
        'id',
        'state_id',
        'name'
    ];

    protected $attributes = [
        'admission_date' => null,
    ];

    /**
     * Get the user that owns the Admission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
}
