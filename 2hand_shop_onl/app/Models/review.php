<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\clothes;
class Review extends Model
{
    protected $fillable = ['cus_id', 'cloth_id', 'rate', 'comment'];
    use HasFactory;
    
}
