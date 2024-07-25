<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\invoice;

class Clothes extends Model
{
    use HasFactory;
    protected $fillable = [
        'cloth_id',
        'cloth_name',
        'cost',
        'category_id',
        'brand',
        'origin',
        'product_for',
        'stock',
        'avg_rate',
        'purchase_quantity',
        'description',
        'forGender'
    ];
}
