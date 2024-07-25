<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth_img extends Model
{
    use HasFactory;
    protected $fillable = [
        'img_id',
        'cloth_id',
        'img'
    ];
}
