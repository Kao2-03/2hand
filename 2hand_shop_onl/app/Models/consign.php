<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consign extends Model
{
    use HasFactory;
    protected $fillable = [
        'consign_id',
        'cus_id',
        'address_id',
        'bank_account',
        'bank_name',
        'cost',
        'who_decide',
        'info',
        'status',
    ];
}
