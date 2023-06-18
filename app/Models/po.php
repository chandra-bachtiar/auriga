<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\po_detail;
use Illuminate\Database\Eloquent\Relations\HasMany;

class po extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id_po','id_bu','no_order','customer_name','address','phone','sales','approval','date','file',
                            'order_type','remarks','grand_total','created_at','updated_at'];

    public function bu()
    {
        return $this->belongsTo(BussinessUnit::class, 'id_bu','id');
    }

    public function po_detail() 
    {
        return $this->HasMany(po_detail::class, 'id_po', 'id_po');
    }

}
