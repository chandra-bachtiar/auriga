<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BussinessUnit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['agency_code','business_unit','brand_name','company'];
}
