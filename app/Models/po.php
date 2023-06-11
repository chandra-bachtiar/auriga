<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class po extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id_po'];

    public function bu()
    {
        return $this->belongsTo(BussinessUnit::class, 'id_bu','id');
    }

}
