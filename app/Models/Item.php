<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_name',
        'description',
        'tax',
        'mrp_price',
        'purchuce_price',
        'agents_id',
        'dealers_id',
        'distributors_id',
        'brands_id',
        'product_models_id',
        'colours_id'
    ];
}
