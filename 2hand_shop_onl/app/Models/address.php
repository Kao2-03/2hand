<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'address_id',
        'cus_id',
        'province_code',
        'district_code',
        'ward_code',
        'address_detail',
        'phone',
        'email',
        'name',
    ];
}
