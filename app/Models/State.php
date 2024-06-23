<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';

    protected $fillable = [
        'id',
        'country_id',
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
    public function domicile(): HasMany
    {
        return $this->hasMany(Domicile::class, 'state_id');
    }
}
