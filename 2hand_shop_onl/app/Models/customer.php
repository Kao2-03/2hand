<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\invoice;
class Customer extends Model
{
    
    protected $fillable = ['user_id', 'cus_id','phone','gender','birth','avatar'];
    use HasFactory;
}
