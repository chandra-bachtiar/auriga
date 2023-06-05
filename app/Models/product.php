<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['gambar','business_unit_id','item_number','sku_dch',
                            'item_name','uom','cbm','kgs','price'];

    public function bu(){
        return $this->belongsTo(BussinessUnit::class, 'business_unit_id', 'id');
    }
}
