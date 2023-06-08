<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_bu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bussiness_unit_id'
    ];
}
