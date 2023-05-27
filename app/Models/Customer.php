<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'shopName',
        'photo',
        'account_holder',
        'account_number',
        'bank_name',
        'bank_branch',
        'city'
    ];
}
