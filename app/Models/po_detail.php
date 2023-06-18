<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\po;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class po_detail extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id_detail'];

    public function po()
    {
        return $this->belongsTo(po::class, 'id_po','id_po');
    }
}
