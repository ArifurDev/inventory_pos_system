<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Selary extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'empolyee_id',
        'email',
        'phone',
        'name',
        'selary',
        'advanch',
        'due',
        'salary_date',

        'status',
    ];
}
