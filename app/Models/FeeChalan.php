<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeChalan extends Model
{
    use HasFactory;
    protected $table = 'fee_chalan';
    protected $fillable = [
        'user_id',
        'admission_id',
        'payment_method',
        'deposited_date',
        'transaction_id',
        'admission_date',
        'bank_name',
        'chalan_no',
        'amount',
        'chalan_pic'
    ];
}
