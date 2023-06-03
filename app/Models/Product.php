<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_id',
        'supplier_name',
        'supplier_id',
        'product_name',
        'product_code',
        'product_storehouse',
        'product_route',
        'product_image',
        'buy_date',
        'expaire_date',
        'buying_price',
        'seling_price',
    ];
}
