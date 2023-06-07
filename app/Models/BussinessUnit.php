<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class BussinessUnit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['gambar','agency_code','business_unit','brand_name','company','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
